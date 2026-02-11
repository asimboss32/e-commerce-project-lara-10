@extends('master')

@section('content')
    <style>
        .thank-you-wrapper {
            position: relative;
            height: 100vh;
            background: #ffffff;
            overflow: hidden;
            text-align: center;
        }

        /* Lighting Text Animation */
        .lighting-text {
            font-size: 20px;
            font-weight: 500;
            animation: glow 1.2s infinite alternate;
        }

        @keyframes glow {
            0% {
                color: #ff0080;
                text-shadow: 0 0 5px #ff0080,
                    0 0 10px #ff0080,
                    0 0 20px #ff4da6;
            }

            50% {
                color: #007bff;
                text-shadow: 0 0 5px #007bff,
                    0 0 10px #007bff,
                    0 0 20px #66b3ff;
            }

            100% {
                color: #28a745;
                text-shadow: 0 0 5px #28a745,
                    0 0 10px #28a745,
                    0 0 20px #66ff99;
            }
        }

        /* Confetti */
        .confetti {
            position: absolute;
            width: 8px;
            height: 14px;
            opacity: 0.9;
            animation: fall linear forwards;
        }

        @keyframes fall {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }

        /* Button */
        .thank-you-btn-inner {
            display: inline-block;
            padding: 12px 30px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 30px;
            margin-top: 25px;
            transition: .3s;
        }

        .thank-you-btn-inner:hover {
            background: #0056b3;
            color: #fff;

        }

        .checkmark-circle {
            width: 120px;
            height: 120px;
            position: relative;
            display: inline-block;
        }

        .checkmark-circle .background {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #28a745;
            position: absolute;
        }

        .checkmark-circle .checkmark.draw:after {
            animation: checkmark 0.8s ease forwards;
            transform: scaleX(-1) rotate(135deg);
        }

        .checkmark-circle .checkmark:after {
            content: '';
            position: absolute;
            left: 35px;
            top: 60px;
            width: 30px;
            height: 60px;
            border-right: 8px solid #fff;
            border-top: 8px solid #fff;
            transform-origin: left top;
            opacity: 0;
        }

        @keyframes checkmark {
            0% {
                height: 0;
                width: 0;
                opacity: 1;
            }

            50% {
                height: 0;
                width: 30px;
                opacity: 1;
            }

            100% {
                height: 60px;
                width: 30px;
                opacity: 1;
            }
        }
    </style>

    <div class="thank-you-wrapper">

        <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);max-width: 750px;">

            <div class="checkmark-circle mb-4">
                <div class="background"></div>
                <div class="checkmark draw"></div>
            </div>


            <h4 class="py-2">অর্ডার নম্বর : {{ $invoice_no }}</h4>

            <p class="lighting-text">
                আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে।
                আমাদের কল সেন্টার থেকে ফোন করে আপনার অর্ডারটি কনফার্ম করা হবে।
            </p>

            <a href="{{ url('/') }}" class="thank-you-btn-inner">
                Go To Home
            </a>

        </div>

    </div>

    <script>
        // Fast Confetti Celebration
        function createConfetti() {
            const confetti = document.createElement("div");
            confetti.classList.add("confetti");

            const colors = ["#ff0080", "#007bff", "#28a745", "#ffc107", "#ff5722"];
            confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];

            confetti.style.left = Math.random() * 100 + "vw";
            confetti.style.animationDuration = (Math.random() * 1 + 1.5) + "s";

            document.querySelector(".thank-you-wrapper").appendChild(confetti);

            setTimeout(() => {
                confetti.remove();
            }, 2000);
        }

        // Burst Effect (Fast Start)
        for (let i = 0; i < 80; i++) {
            createConfetti();
        }

        // Continuous light falling
        setInterval(createConfetti, 150);
    </script>
@endsection
