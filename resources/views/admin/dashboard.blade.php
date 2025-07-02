@extends('admin.main-admin')

@section('container')
    <div class="p-4 sm:ml-64">
        <div class="p-4 min-h-screen">
            <div class="flex flex-col gap-3" data-aos="fade-up">
                <h1 class="text-xl">Selamat datang, Admin!</h1>
                <div class="flex flex-row gap-2">
                    <div
                        class="bg-white h-[150px] flex flex-col justify-center rounded-xl p-4 border-2 border-[#7F7F7F] w-full">
                        <div class="text-[20px] font-semibold">
                            Jumlah Postingan
                        </div>
                        <div class="text-[52px] font-semibold">
                            #
                        </div>
                    </div>
                    <div
                        class="bg-white h-[150px] flex flex-col justify-center rounded-xl p-4 border-2 border-[#7F7F7F] w-full">
                        <div class="text-[20px] font-semibold">
                            Jumlah Pengguna
                        </div>
                        <div class="text-[52px] font-semibold">
                            #
                        </div>
                    </div>
                    <div
                        class="bg-white h-[150px] flex flex-col justify-center rounded-xl p-4 border-2 border-[#7F7F7F] w-full">
                        <div class="text-[20px] font-semibold">
                            Total Pendapatan
                        </div>
                        <div class="text-[32px] font-semibold">
                            #
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full h-full mt-5 px-8 border-2 border-[#7F7F7F] rounded-xl" data-aos="fade-up">
                <canvas id="income_payment" class="w-full">
                </canvas>
            </div>
        </div>
    </div>
@endsection
