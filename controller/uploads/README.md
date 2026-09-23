# Customizer image storage

The PHP web-server user must be able to write to `images/`. Keep uploaded files
out of version control; the directory's `.gitignore` and Apache `.htaccess`
should be deployed with the application.

For macOS XAMPP, whose Apache worker runs as `daemon`, grant write access to
only this directory from the project root:

```sh
chmod +a 'daemon allow list,add_file,search,add_subdirectory' controller/uploads/images
```

On another server, assign directory ownership or group permissions to its PHP
worker. The upload endpoint accepts PNG, JPEG, GIF and WebP images up to 1 MB,
uses unique filenames, and returns JSON errors if storage is unavailable.
