# 🚀 Deployment Guide - Railway

This guide will help you deploy your Event Organizer Laravel application to Railway for your portfolio.

## Prerequisites

- GitHub account
- Railway account (free tier available)
- Your Laravel project pushed to GitHub

## Step-by-Step Deployment

### 1. Prepare Your Repository

Make sure your code is committed and pushed to GitHub:

```bash
git add .
git commit -m "Configure for Railway deployment"
git push origin main
```

### 2. Create Railway Account

1. Go to [Railway.app](https://railway.app)
2. Sign up with your GitHub account
3. Complete the verification process

### 3. Deploy Your Application

1. **Create New Project:**
   - Click "New Project"
   - Select "Deploy from GitHub repo"
   - Choose your repository

2. **Railway will automatically:**
   - Detect it's a Laravel project
   - Use the configuration files we created
   - Start the build process

### 4. Add MySQL Database

1. In your Railway project dashboard:
   - Click "New" → "Database" → "MySQL"
   - Railway will create a MySQL database

2. **Connect Database to App:**
   - Go to your app service
   - Click "Variables" tab
   - Railway automatically adds database environment variables

### 5. Configure Environment Variables

1. In your app service, go to "Variables" tab
2. Add these variables (copy from `railway.env.example`):

```env
APP_NAME="Event Organizer"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app-name.railway.app

DB_CONNECTION=mysql
# Railway automatically sets DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

### 6. Deploy and Test

1. **Railway will automatically:**
   - Build your application
   - Install dependencies
   - Run the startup script
   - Execute database migrations
   - Seed the database

2. **Check Deployment:**
   - Go to "Deployments" tab
   - Monitor the build logs
   - Wait for "Deploy Successful"

3. **Access Your App:**
   - Click on your app service
   - Copy the generated URL
   - Your app is live! 🎉

## Troubleshooting

### Common Issues

1. **Build Fails:**
   - Check the build logs in Railway
   - Ensure all dependencies are in `composer.json`
   - Verify PHP version compatibility

2. **Database Connection Issues:**
   - Verify database variables are set
   - Check if MySQL service is running
   - Ensure migrations can run

3. **App Not Starting:**
   - Check the startup logs
   - Verify `APP_KEY` is generated
   - Ensure all required variables are set

### Useful Commands

You can run these in Railway's "Variables" → "Custom Domains" → "Terminal":

```bash
# Check Laravel status
php artisan --version

# Run migrations manually
php artisan migrate --force

# Clear caches
php artisan config:clear
php artisan cache:clear

# Check environment
php artisan env
```

## Custom Domain (Optional)

1. In Railway dashboard:
   - Go to your app service
   - Click "Settings" → "Domains"
   - Add your custom domain
   - Update DNS records as instructed

2. Update `APP_URL` in environment variables

## Monitoring

Railway provides:
- **Logs:** Real-time application logs
- **Metrics:** CPU, memory usage
- **Deployments:** Deployment history
- **Health Checks:** Automatic health monitoring

## Cost Optimization

- **Free Tier:** 500 hours/month
- **Hobby Plan:** $5/month for unlimited usage
- **Scale as needed:** Pay only for what you use

## Portfolio Integration

Once deployed, you can:

1. **Add to your portfolio:**
   - Include the live URL
   - Add screenshots
   - Describe the technologies used

2. **GitHub README:**
   - Add the live demo link
   - Include deployment badges
   - Document the tech stack

3. **LinkedIn/Resume:**
   - Mention the live project
   - Highlight Laravel/Railway experience

## Support

- **Railway Docs:** [docs.railway.app](https://docs.railway.app)
- **Laravel Docs:** [laravel.com/docs](https://laravel.com/docs)
- **Community:** Railway Discord, Laravel Forums

---

🎉 **Congratulations!** Your Event Organizer is now live and ready for your portfolio! 