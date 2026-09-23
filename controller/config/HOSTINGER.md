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

After uploading, open the website and click **Start designing**. The request to
`controller/lanyard/material.php` with `{"action":"getMaterials"}` should return
HTTP 200 and a populated `lanyards` array. If it still returns 503, check that
the database user's current password matches the hosting configuration file.
