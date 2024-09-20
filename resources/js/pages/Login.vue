<template>
    <section class="w-full h-full flex justify-center items-center">
        <div class="border shadow-md rounded-lg px-3 py-5 w-1/4 h-1/2 flex flex-col">
            <form action="" class="flex flex-col h-full items-center">
                <h2 class="font-semibold text-3xl">Login Form</h2>
                <div class="flex-grow w-full flex items-center  ">
                    <span class="flex flex-col w-full">
                        <label for="email-input">
                            <span class="text-red-400">*</span>
                            Email
                        </label>
                        <input type="text" class="border-[1.5px] p-2 w-full rounded-lg" name="" id="email-input" placeholder="Enter your email ...">
                    </span>
                </div>
                <div class="w-full">
                    <button class="bg-blue-400 py-2 px-3 text-white rounded-lg w-full">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </section>
</template>