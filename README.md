
# Laravel Loyihasi

Ushbu loyiha Laravel freymvorkiga asoslangan bo‘lib, tezkor rivojlantirishni boshlash uchun standart sozlamalarni o‘z ichiga oladi.

## Talablar

Loyihani ishga tushirishdan oldin quyidagi dasturlar sizning tizimingizga o‘rnatilganligiga ishonch hosil qiling:

- PHP >= 8.0
- Composer
- Laravel Installer (ixtiyoriy, lekin tavsiya etiladi)
- Ma'lumotlar bazasi (MySQL, PostgreSQL yoki boshqa)
- Node.js & npm (frontend resurslari uchun)

## O‘rnatish

Loyihani o‘z tizimingizda sozlash uchun quyidagi bosqichlarni bajaring:

### 2. Bog‘liqliklarni o‘rnatish
PHP bog‘liqliklari va frontend modullarni o‘rnatish:
```bash
composer install
npm install
npm run dev
```

### 3. Muhit konfiguratsiyasi
`.env.example` faylini `.env` sifatida nusxalang va konfiguratsiyani o‘zgartiring:
```bash
cp .env.example .env
```

Muhit faylida quyidagi sozlamalarni yangilang:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4. Ilova kalitini yaratish
Laravel ilovasi uchun kalit yarating:
```bash
php artisan key:generate
```

### 5. Ma'lumotlar bazasini sozlash
Migratsiyalarni ishga tushiring:
```bash
php artisan migrate
```

(Ixtiyoriy) Ma'lumotlarni to‘ldirish uchun seederlarni ishga tushiring:
```bash
php artisan db:seed
```

### 6. Ilovani ishga tushirish
Laravelning o‘rnatilgan serverini ishga tushirish uchun:
```bash
php artisan serve
```

Brauzer orqali ilovaga kirish: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Foydali buyruqlar

- `php artisan serve` - Ilovani ishga tushirish.
- `php artisan migrate` - Migratsiyalarni ishga tushirish.
- `php artisan db:seed` - Seederlarni ishga tushirish.
- `npm run dev` - Frontend resurslarini ishlab chiqish rejimida kompilyatsiya qilish.
- `npm run prod` - Frontend resurslarini ishlab chiqarish uchun kompilyatsiya qilish.

## Testlash

Laravel ilovasini testlash uchun:
```bash
php artisan test
```

## Deployment (Ishlab chiqarishga chiqarish)

Laravel ilovasini ishlab chiqarishga chiqarishdan oldin quyidagi buyruqlarni bajaring:

1. Bog‘liqliklarni o‘rnatish:
   ```bash
   composer install --optimize-autoloader --no-dev
   ```

2. Keshni yaratish:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. Migratsiyalarni ishga tushirish:
   ```bash
   php artisan migrate --force
   ```

4. Frontend resurslarini kompilyatsiya qilish:
   ```bash
   npm run prod
   ```
