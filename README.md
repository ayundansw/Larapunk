# Larapunk


- **Frontend**: HTML, JavaScript, CSS (Tailwind CSS)
- **Backend**: Laravel (PHP)
- **Database**: MySQL (melalui Laragon)
- **Code Editor**: VSCode

---

## Struktur Project
Larapunk/
│
├── app/ # Kode backend Laravel (models, controllers)
├── resources/
│ ├── views/ # Blade templates (HTML)
│ └── css/ # File Tailwind
├── database/ # Migrations, seeders
├── public/ # Aset publik (gambar, CSS hasil build)
├── routes/ # Route web & API
├── docs/ # Dokumentasi pembelajaran
└── README.md

### Jalankan perintah berikut di terminal (VSCode):
```powershell
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p