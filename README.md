# Laravel 12 with Vue, Vite, and Shopify Authentication

This project is a Laravel 12 application integrated with Vue.js for the frontend, Vite as the build tool, and Shopify OAuth for authentication. It provides a foundation for building Shopify apps with a modern PHP and JavaScript stack.

## Features
- **Laravel 12**: Backend framework for robust server-side logic.
- **Vue.js**: Frontend framework for reactive and component-based UI.
- **Vite**: Fast build tool for modern frontend development.
- **Shopify OAuth**: Authentication for Shopify app users.
- **API-driven**: Laravel serves as a backend API for the Vue frontend.

## Prerequisites
- PHP >= 8.2
- Composer
- Node.js >= 18.x
- MySQL or another supported database
- Shopify Partner account and a Shopify app
- Ngrok (for local development and Shopify OAuth)

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/your-repo.git
   cd your-repo
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Copy environment file**
   ```bash
   cp .env.example .env
   ```

5. **Configure environment variables**
   Update `.env` with your database, Shopify app credentials, and other settings:
   ```env
   APP_URL=https://your-ngrok-url.ngrok.io
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password

   SHOPIFY_API_KEY=your_shopify_api_key
   SHOPIFY_API_SECRET=your_shopify_api_secret
   SHOPIFY_SCOPES=read_products,write_products
   SHOPIFY_REDIRECT_URI=https://your-ngrok-url.ngrok.io/auth/shopify/callback
   ```

6. **Generate application key**
   ```bash
   php artisan key:generate
   ```

7. **Run database migrations**
   ```bash
   php artisan migrate
   ```

8. **Start Vite development server**
   ```bash
   npm run dev
   ```

9. **Start Laravel server**
   ```bash
   php artisan serve
   ```

10. **Expose local server with Ngrok**
    ```bash
    ngrok http 8000
    ```
    Update `.env` with the Ngrok URL.

## Shopify Authentication Setup
1. Create a Shopify app in your Shopify Partner dashboard.
2. Set the app URL to your Ngrok URL (e.g., `https://your-ngrok-url.ngrok.io`).
3. Set the redirect URL to `https://your-ngrok-url.ngrok.io/auth/shopify/callback`.
4. Add your Shopify API key, secret, and scopes to `.env`.
5. Visit `/auth/shopify` to initiate OAuth flow.

## Project Structure
```
├── app/                  # Laravel backend logic
├── resources/
│   ├── js/              # Vue components and frontend logic
│   ├── views/           # Blade templates (if used)
├── routes/
│   ├── api.php          # API routes for Vue frontend
│   ├── web.php          # Web routes for Shopify auth
├── public/               # Vite output and public assets
├── vite.config.js        # Vite configuration
```

## Usage
- Access the app at `https://your-ngrok-url.ngrok.io`.
- Authenticate via Shopify OAuth to access protected routes.
- Use Vue components in `resources/js` for frontend development.
- API endpoints are defined in `routes/api.php`.

## Development
- **Frontend**: Edit Vue components in `resources/js`. Vite hot-reloads changes.
- **Backend**: Use Laravel controllers and models in `app/`.
- **Shopify API**: Interact with Shopify using the `osiset/laravel-shopify` package or custom API calls.

## Building for Production
1. Build frontend assets:
   ```bash
   npm run build
   ```
2. Deploy Laravel app to your server.
3. Update `.env` with production settings (e.g., real domain instead of Ngrok).

## Contributing
1. Fork the repository.
2. Create a feature branch (`git checkout -b feature/your-feature`).
3. Commit changes (`git commit -m 'Add your feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Open a pull request.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Support
For issues, please open a ticket on the [GitHub Issues page](https://github.com/your-username/your-repo/issues).
