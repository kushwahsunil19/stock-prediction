@extends('frontend.layouts.master')
@section('content')


        <div class="text-6xl flex flex-col items-center text-white mt-20">
            <h1 class="font-bold">Quis Competition</h1>
            <h1 class="font-bold"> UIIsco Labories Dolore</h1>
            <p class="text-sm w-[50%] pt-8 mx-auto">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum totam maxime perferendis, mollitia possimus excepturi neque accusamus, repudiandae doloribus molestiae alias ab aperiam minus commodi?</p>
        </div>



        <div class="w-[80%] mx-auto mt-5 bg-slate-700 rounded-3xl">
            <div class="flex flex-col items-center">
                <div class="text-4xl mt-10 text-white">
                    <h1>Hi Billy Kane!</h1>
                    <h1>You Have:</h1>
                </div>


                <input class="text-white m-5 rounded-full bg-slate-500 h-16 w-[70%] placeholder:text-white" type="email" placeholder="  name@example.com">

                <input class="text-white m-5 rounded-full  bg-slate-500   h-16 w-[70%] placeholder:text-white" type="email" placeholder="  name@example.com">

                <div class="bg-slate-800 p-10 m-10 rounded-3xl h-auto w-[80%] mx-auto">

                    <div class="w-full space-y-5 flex flex-col justify-center items-center">
                        <p class="text-sm mt-5 text-gray-300">This is the big container. You can add any content you want here.</p>
                        <h1 class="text-5xl font-bold text-blue-600">160 Tokens</h1>

                        <button class="text-white m-5 rounded-3xl bg-green-600 h-11 w-[70%]">Competition </button>

                        <p class="mt-8 text-gray-300">This is the big container. You can add any content you want here </p>

                    </div>

                </div>


            </div>

        </div>




        <div class="w-[80%] mx-auto m-10 bg-slate-400 rounded-3xl overflow-x-auto">
            <table class="table-auto border w-full h-full bg-gray-700 border-gray-400">
                <thead>
                    <tr class="bg-blue-300">
                        <th class="bg-skyblue px-6 py-2 border ">Column 1</th>
                        <th class="bg-skyblue px-4 py-2 border">Column 2</th>
                        <th class="bg-skyblue px-4 py-2 border">Column 3</th>
                        <th class="bg-skyblue px-4 py-2 border sm:w-1/5 md:w-1/5 lg:w-1/5">Q1</th>
                        <th class="bg-skyblue px-4 py-2 border sm:w-1/5 md:w-1/5 lg:w-1/5">Q2</th>
                        <th class="bg-skyblue px-4 py-2 border sm:w-1/5 md:w-1/5 lg:w-1/5">Q3</th>
                        <th class="bg-skyblue px-4 py-2 border sm:w-1/5 md:w-1/5 lg:w-1/5">Q4</th>
                        <th class="bg-skyblue px-4 py-2 border sm:w-1/5 md:w-1/5 lg:w-1/5">Q5</th>
                        <th class="bg-skyblue px-4 py-2 border">Column 9</th>
                    </tr>
                </thead>

                <tbody class="bg-gray-700 text-white">
                    <tr>
                        <td class="border px-4 py-2" rowspan="4">Data 1</td>
                        <td class="border px-4 py-2" rowspan="4">Data 2</td>
                        <td class="border px-4 py-2">Data 3</td>
                        <td class="border px-4 py-2 sm:w-1/5 md:w-1/5 lg:w-1/5">Data 4</td>
                        <td class="border px-4 py-2 sm:w-1/5 md:w-1/5 lg:w-1/5">Data 5</td>
                        <td class="border px-4 py-2 sm:w-1/5 md:w-1/5 lg:w-1/5">Data 6</td>
                        <td class="border px-4 py-2 sm:w-1/5 md:w-1/5 lg:w-1/5">Data 7</td>
                        <td class="border px-4 py-2 sm:w-1/5 md:w-1/5 lg:w-1/5">Data 8</td>
                        <td class="border px-4 py-2 sm:w-1/5 md:w-1/5 lg:w-1/5">Data 9</td>


                    </tr>
                    <!-- Add more rows with data if needed -->

                    <tr>
                        <td class="border px-4 py-2" rowspan="2">Data 2</td>
                        <td class="border px-4 py-16 sm:w-1/5 md:w-1/5 lg:w-1/5" rowspan="2"></td>
                        <td class="border px-4 py-16 sm:w-1/5 md:w-1/5 lg:w-1/5" rowspan="2"></td>
                        <td class="border px-4 py-16 sm:w-1/5 md:w-1/5 lg:w-1/5" rowspan="2"></td>
                        <td class="border px-4 py-16 sm:w-1/5 md:w-1/5 lg:w-1/5" rowspan="2"></td>
                        <td class="border px-4 py-16 sm:w-1/5 md:w-1/5 lg:w-1/5" rowspan="2"></td>

                    </tr>

                    <tr>
                        <td class="border px-4 py-2">Data 9</td>
                    </tr>
                </tbody>
            </table>
        </div>

@endsection