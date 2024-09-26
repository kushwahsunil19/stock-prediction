@extends('frontend.layouts.master')
@section('content')
<div class="middle-content">
    <h1 class="text-3xl bg-blue-300 rounded-sm text-white w-[40%] h-16 items-center mx-auto font-bold justify-center">
        Predict the Apple stock highest price.</h1>
    <div class="text-white flex flex-col justify-center mt-14">
        <div class="text-white flex flex-col w-[50%] mx-auto justify-center space-y-3">
            <h3>Rule of competition</h3>

        </div>
    </div>
    <div class="table-container w-[50%] mx-auto m-10 bg-slate-400">
        <div class="table-wrapper overflow-x-auto">
            <table class="table-auto border w-full h-full bg-gray-700 border-gray-400">
                <thead>
                    <tr class="bg-blue-300">
                        <th class="bg-skyblue px-6 py-2 border">Length of sprint</th>
                        <th class="bg-skyblue px-4 py-2 border">What is the difference between Stock and Share?</th>
                        <th class="bg-skyblue px-4 py-2 border">What is one major reason for global inequality?</th>
                        <th class="bg-skyblue px-4 py-2 border">What factor contributes to the perceived strong
                            influence of the United States over the Philippines?</th>
                        <th class="bg-skyblue px-4 py-2 border">What is the Stock Exchange Sensitive Index’s
                            (Sensex) total number of companies?</th>
                        <th class="bg-skyblue px-4 py-2 border">Which of the below does not have anything to do with
                            a stock exchange?</th>
                        <th class="bg-skyblue px-4 py-2 border">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-700 text-white">
                    <tr class="index-box">
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                    </tr>
                    <tr class="index-box">
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-white flex flex-col justify-center mt-14">
        <div class="text-white flex flex-col w-[50%] mx-auto justify-center space-y-3">
            <h3>Rule of competition</h3>
            <div>
                <p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a type specimen book. It has survived not
                    only five centuries, but also the leap into electronic typesetting, remaining essentially
                    unchanged.
                    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                    passages,
                    and more recently with desktop publishing software like Aldus PageMaker including versions of
                    Lorem
                    Ipsum.</p>
                <p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a type specimen book. It has survived not
                    only five centuries, but also the leap into electronic typesetting, remaining essentially
                    unchanged.
                    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                    passages,
                    and more recently with desktop publishing software like Aldus PageMaker including versions of
                    Lorem
                    Ipsum.</p>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="http://127.0.0.1:8000/sign-up" class="bg-green-400 font-bold p-2 text-3xl w-72">Participate now</a>
    </div>
</div>

@endsection