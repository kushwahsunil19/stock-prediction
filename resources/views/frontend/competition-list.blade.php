@extends('frontend.layouts.master')
@section('content')
<style>
    .floating-news-container {
        position: relative;
        overflow: hidden;
        width: 50%;
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
        /* background-color: #006699; */
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

    a.btn.btn-primary.bg_color {
        background: red;
    }
</style>
<div class="middle-content body-bg-img ">


    <!-- Floating News Section -->


    <div class="table-container">
        <div class="table-wrapper">
            <table class="table-auto border table-bordered">
                <thead>
                    <tr class="bg-blue-300">
                        <th class="border">Competition</th>
                        <th class="border">Select your sprint day from</th>
                        <th class="border">Select your sprint day untill</th>
                        <th class="border">Offered Token</th>
                        <th class="border">Length of Sprint</th>
                        <th class="border"></th>
                    </tr>
                </thead>

                    <tbody class="bg-gray-700 text-white">
                    @php $noCompetitions = true; @endphp
                    
                    @foreach($competitions as $res)
                        @php
                            $current_date = date('Y-m-d');
                            $token_expiry_date = $res->token_expiry_date;
                            $visiblity_date = date("Y-m-d 23:59:59", strtotime($res->token_expiry_date . " +7 day"));
                            $current_date_new = date('Y-m-d h:i:s');
                        @endphp
                
                        <!-- Check if the competition meets the conditions -->
                        @if(isset($res->competition_id) && $res->id == $res->competition_id && $visiblity_date >= $current_date_new && $res->startdate <= $current_date_new && $res->startdate < $visiblity_date)
                            @php $noCompetitions = false; @endphp
                            <tr class="index-box">
                                <td class="border">{{ $res->name }}</td>
                                <td class="border"><p translate="no">{{ \Carbon\Carbon::parse($res->startdate)->format('Y-m-d') }}   </p></td>
                                <td class="border"><p translate="no">{{ \Carbon\Carbon::parse($res->enddate)->format('Y-m-d') }} </p></td>
                                <td class="border">{{ $res->token_no }}</td>
                                <td class="border">{{ $res->sprint }}</td>
                                <td class="border">
                                    <a href="{{ route('competition', $res->id) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        @elseif($res->enddate >= $current_date && $res->startdate <= $current_date && $res->startdate < $res->enddate)
                            @php $noCompetitions = false; @endphp
                            <tr class="index-box">
                                <td class="border">{{ $res->name }}</td>
                                <td class="border"><p translate="no">{{ \Carbon\Carbon::parse($res->startdate)->format('Y-m-d') }} </p></td>
                                <td class="border"><p translate="no">{{ \Carbon\Carbon::parse($res->enddate)->format('Y-m-d') }} </p></td>
                                <td class="border">{{ $res->token_no }}</td>
                                <td class="border">{{ $res->sprint }}</td>
                                <td class="border">
                                    <a href="{{ route('register', $res->id) }}" class="btn btn-primary">Join Us</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                
                    @if($noCompetitions)
                        <tr class="index-box">
                            <td class="border" colspan="6" style="text-align:center;">There are no competitions</td>
                        </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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
        // tdElements.forEach(td => {
        //     td.innerText = splitTextIntoLines(td.innerText, 4);
        // });
    });
</script>

@endsection