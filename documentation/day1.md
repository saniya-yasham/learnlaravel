# Lravel Installation (day 14 of backend course)
To get started, students should run the following command:

```bash
composer global require laravel/installer
```

Next, create a new Laravel project:

```bash
laravel new reponame
```

During setup, you will be prompted with a few questions:

1. **Starter Kit:** Select **None**.
2. **Testing Framework:** Choose **Pest**.
3. **Database:** Select **MySQL**.

We learned that **Vite** is a package bundler. It bundles CSS and JavaScript files for production, making the website faster.

You will also see a `README.md` file, which helps GitHub users understand your project.

Additionally, there are three important files: `composer.json`, `package.json`, and `composer.lock`. These files contain version numbers, packages, and plugins used in the project.

The `.env` file is the environment configuration file. For now, you only need to change the `APP_NAME` and database connection settings. Leave the other values as they are.
