<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stream | Verifikasi OTP</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");
    </style>
    <script src="{{ asset('stream/assets/script/tailwind-config.js') }}"></script>

    <style type="text/tailwindcss">
        @layer components {
            .side-link {
                @apply flex items-center font-normal text-stream-gray text-base w-full p-4 rounded-2xl gap-[10px] transition-all;
            }

            .side-link.active {
                @apply bg-softpur font-semibold text-white;
            }
        }
    </style>
</head>

<body class="bg-stream-dark font-poppins h-screen">
    <!-- START: OTP Verification Section -->
    <div class="flex items-center justify-center h-full">
        <div class="bg-[#19152E] p-8 rounded-lg shadow-lg max-w-sm w-full">
            <h1 class="text-2xl font-bold text-white mb-4 text-center">Verifikasi Kode OTP</h1>
            <p class="text-gray-400 mb-4 text-center">Masukkan kode OTP yang telah kami kirim ke email atau nomor ponsel Anda.</p>
           {{--  <form method="POST" action="{{ route('otp.verify.post') }}">
                @csrf
                <div class="flex justify-between gap-2 mb-4">
                    <input type="text" maxlength="1" class="bg-gray-800 text-white text-center text-2xl w-12 h-12 rounded" required>
                    <input type="text" maxlength="1" class="bg-gray-800 text-white text-center text-2xl w-12 h-12 rounded" required>
                    <input type="text" maxlength="1" class="bg-gray-800 text-white text-center text-2xl w-12 h-12 rounded" required>
                    <input type="text" maxlength="1" class="bg-gray-800 text-white text-center text-2xl w-12 h-12 rounded" required>
                    <input type="text" maxlength="1" class="bg-gray-800 text-white text-center text-2xl w-12 h-12 rounded" required>
                    <input type="text" maxlength="1" class="bg-gray-800 text-white text-center text-2xl w-12 h-12 rounded" required>
                </div>

                <input type="hidden" name="email" value="{{ session('email') }}">

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded w-full">
                    Verifikasi Kode OTP
                </button>
            </form> --}}

            <form method="POST" action="{{ route('otp.verify.post') }}">
                @csrf
                <div class="mb-4">
                    <input type="text" name="otp" maxlength="6" class="bg-gray-800 text-white text-center text-2xl w-full h-12 rounded" required placeholder="Masukkan kode OTP">
                </div>
            
                <input type="hidden" name="email" value="{{ session('email') }}">
            
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded w-full">
                    Verifikasi Kode OTP
                </button>
            </form>
            
            <div class="mt-4 text-center text-gray-400">
                <p>Tidak menerima kode? <a href="#" class="text-blue-500 hover:underline">Kirim ulang kode</a></p>
            </div>
        </div>
    </div>
    <!-- END: OTP Verification Section -->
</body>
</html>
