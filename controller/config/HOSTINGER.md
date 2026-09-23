# Database configuration on Hostinger

The shared `database.php` reads `database.local.php` from the same directory.
Keep `database.local.php` on the hosting server only. It is excluded from Git
so future deployments can update the application without replacing credentials.

Upload both files from the prepared `.hostinger-deploy/controller/config/`
folder to `public_html/controller/config/`:

- `database.php`: connection code with support for the hosting configuration.
- `database.local.php`: the site's existing Hostinger database credentials.

The `.hostinger-deploy/hostinger-database.zip` archive contains the same files.
Extract it on your computer and upload only the two PHP files. Keep the ZIP
off the public website because it contains private database credentials.

Do not copy the hosting `database.local.php` into the local XAMPP configuration
directory. Without that file, XAMPP keeps using its existing local defaults.
Environment variables named `LANYARDS_DB_HOST`, `LANYARDS_DB_NAME`,
`LANYARDS_DB_USER` and `LANYARDS_DB_PASSWORD` take precedence when defined.

The shared code reuses a single PDO per credential set within a request and
enables PDO persistent connections between requests handled by the same PHP
worker. Models can release their Database wrapper without opening a new MySQL
connection for the next catalogue query. This avoids the catalogue's previous
177 connections per load and Hostinger's connection-rate limit. See
[Hostinger's guidance](https://www.hostinger.com/support/how-to-fix-mysql-operation-not-permitted-error/).

After uploading, open the website and click **Start designing**. The request to
`controller/lanyard/material.php` with `{"action":"getMaterials"}` should return
HTTP 200 and a populated `lanyards` array.

If it still returns 503, upload the updated `database.php` without replacing
`database.local.php`, then click **Start designing** once. Open the hosting
File Manager using **Access all files of Business Web Hosting** and read the
last entries in `.logs/error_log_lanyardsforyou_com`. Connection failures include
`sqlstate`, `driver_code`, `reason`, `mysql_driver_available` and `local_config_present`.
Connection details and passwords are not included in these diagnostics.

Common MySQL driver codes:

- `1045`: MySQL rejected authentication; verify the current database user's password.
- `1044`: the user cannot access this database; check its database assignment/permissions.
- `1049`: the configured database name does not exist.
- `2002` or `2003`: MySQL could not be reached using the configured host/socket.
  Check `reason`: `operation_not_permitted` can indicate Hostinger's connection
  rate limit; `socket_not_found` or `connection_refused` indicate a different
  transport problem.
- `1040`, `1203` or `1226`: a connection or account resource limit was reached.

If `local_config_present` is false, the private file is missing from
`public_html/controller/config/`. If `mysql_driver_available` is false,
enable the PDO MySQL extension in the hosting PHP configuration.
