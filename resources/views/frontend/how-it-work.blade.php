@extends('frontend.layouts.master')
@section('content')
<style>
    .floating-news-container {
        position: relative;
        overflow: hidden;
        width: 80%;
        margin: auto;
        color: white;
    }

    .floating-news {
        display: inline-block;
        white-space: nowrap;
        animation: float-horizontal 10s linear infinite;
    }

    @keyframes float-horizontal {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .middle-content th {
        background-color: #93C5FD;
        color: #fff;
    }

    .middle-content th,
    .middle-content td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        /*background-color: #006699;*/
    }

    .table-bordered thead th {
        border-bottom-width: 2px;
        background-color: #44B2AA;
        color: white;
      
        white-space: pre-wrap; 
    }

    .table-container {
        width: 100%;
        overflow-x: auto;
    }

    .table-wrapper {
        width: 80%;
    }

    /* .table-auto {
        width: 100%;
        min-width: 600px;
    } */

    @media (max-width: 768px) {
        .floating-news-container {
            width: 100%;
        }

        .middle-content table {
            width: 100%;
            display: block;
            overflow-x: auto;
        }

        .middle-content th,
        .middle-content td {
            white-space: nowrap;
        }

        .middle-content h1 {
            width: 100%;
            font-size: 1.5rem;
        }

        .floating-news-container,
        .table-container {
            width: 100%;
        }
        .table-wrapper {
            width: 100%;
        }
    }

    @media (max-width: 320px) {
        .footer-logo {
            margin-left: -8% !important;
        }

        #bordered-form {
            width: 100% !important;
        }

        .middle-content .table-container {
            width: 100%;
        }
    }

    @media (max-width: 375px) {
        img.h-24.w-80.responsive {
            margin-left: 27% !important;
        }
    }

    @media (max-width: 425px) {
        .footer-logo img {
            margin-left: 34% !important;
        }
        #bordered-form {
            width: 100%;
        }
    }
</style>
<div class="middle-content body-bg-img ">
    @if(isset($data->name))
    <h1 class="text-3xl bg-blue-300 rounded-sm text-white w-[40%] h-16 items-center mx-auto font-bold justify-center">
      {{$data->name}}</h1>
    @endif

  <!-- Floating News Section -->
    @if(isset($data->news_heading))    
    <div class="floating-news-container shadow">
        <marquee>{{$data->news_heading}}</marquee>
    </div>
    @elseif($competitionEndData->news_heading)
    <div class="floating-news-container shadow">
        <marquee>{{$competitionEndData->news_heading}}</marquee>
    </div>
    @endif
    <br>
    @if(isset($data->summary))    
    <div class="mt-10 mx-auto wrapper"  id="bordered-form">
        <p id="form-border-text" class="text-white">Summary</p>
        <div class="scroll-container">
            <div class="text-white" style="width: 100%;">
            {!! $data->summary !!} 
            </div>
        </div>
    </div>
    @elseif($competitionEndData->news_heading)
    <div class="mt-10 mx-auto wrapper"  id="bordered-form">
        <p id="form-border-text" class="text-white">Summary</p>
        <div class="scroll-container">
            <div class="text-white" style="width: 100%;">
            {!! $competitionEndData->summary !!} 
            </div>
        </div>
    </div>
    @endif
    <div class="table-container">
        <div class="table-wrapper">
            <table class="table-auto border table-bordered">
                <thead>
                    <tr class="bg-blue-300">
                        <th class="border">Days you have selected for competition</th>
                        <th class="border">Predict the opening price of company XXX on the Paris Stock Exchange</th>
                        <th class="border">Predict the closing price of company YYY on the Paris Stock Exchange</th>
                        <th class="border">Which of these 2 indices will have a better progression at the close of the Paris Stock Exchange?</th>
                        <th class="border">Validate the submission of your predictions.</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-700 text-white">
                    <tr class="index-box">
                        <td class="border">2024-06-10</td>
                        <td class="border">13.45</td>
                        <td class="border">79.80</td>
                        <td class="border">CAC40</td>
                        <td class="border">Click here to send your predictions before the deadline.</td>
                    </tr>
                    <tr class="index-box">
                        <td class="border">2024-06-11</td>
                        <td class="border">To be filled in before the deadline.</td>
                        <td class="border">To be filled in before the deadline.</td>
                        <td class="border">To be filled in before the deadline.</td>
                        <td class="border">To be filled in before the deadline.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center">
        <a href="@if(Auth::check()){{ route('register',LatestCompetitionId())}}@else {{ route('sign-up')}}@endif" class="bg-green-400 font-bold p-2 text-3xl w-72">Participate now</a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const splitTextIntoLines = (text, wordsPerLine) => {
            const words = text.split(' ');
            let formattedText = '';
            for (let i = 0; i < words.length; i++) {
                if (i > 0 && i % wordsPerLine === 0) {
                    formattedText += '\n';
                }
                formattedText += words[i] + ' ';
            }
            return formattedText.trim();
        };

        const thElements = document.querySelectorAll('thead th');
        thElements.forEach(th => {
            th.innerText = splitTextIntoLines(th.innerText, 4);
        });

        const tdElements = document.querySelectorAll('tbody td');
        tdElements.forEach(td => {
            td.innerText = splitTextIntoLines(td.innerText, 4);
        });
    });
</script>

@endsection

