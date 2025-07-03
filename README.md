# Mars Mission

Proyecto para una prueba técnica: simulador de movimientos de un rover en Marte

---

## 🛠️ Tecnologías

- Backend: Laravel (PHP 8.4.8)
- Frontend: Vue 3 + Vite

---

## 🚀 Cómo usarlo

### Docker

```bash
docker compose up -d
```

### Manual

#### 1. Instalar dependencias

```bash
composer install
npm install
```

#### 2. Arrancar servidor

```bash
php artisan serve
npm run dev
```

### Usar la app

- Abre en navegador `http://localhost:8000`
- Introduce posición inicial (x, y), dirección y comandos (ejemplo: `FFRFFL`)
- Pulsa “Send” para mover el rover y ver los resultados
- Si hay obstáculos, se indicará claramente

---

## 🧠 Lógica del rover

- La cuadrícula es de 200x200 (0 a 199 en X e Y)
- El rover puede girar a la izquierda (L), derecha (R) y avanzar (F)
- Si hay un obstáculo en la siguiente posición, el rover para y lo reporta
- Obstáculos predefinidos, se pueden configurar en `app/Rover.php`)

---

## 🧪 Testing

Para ejecutar los tests:

```bash
./vendor/bin/pest
```

---

## 📚 Estructura

- `app/Rover.php` → lógica principal del rover
- `app/Http/Controllers/RoverController.php` → controlador API
- `resources/js/Pages/Welcome.vue` → interfaz básica
