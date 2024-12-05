@extends('layouts.app')

@section('content')
    <div class="memory-puzzle-container">
        <div class="container">
            <h1>Memory Puzzle Game</h1>
            <div class="button-container">
                <button id="start-button">Mulai Permainan</button>
            </div>
            <div class="game-container">
                <div class="game-board">
                </div>
            </div>
        </div>
    </div>
@endsection

</html>

<style>
    .header-container {
        width: 100%;
        padding: 20px 0;
        text-align: center;
        background: rgba(0, 0, 0, 0.7);
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
    }

    .header-container h1 {
        font-size: 36px;
        color: #fff;
        margin: 0;
        text-transform: uppercase;
        font-weight: bold;
    }

    .button-container {
        margin-top: 15px;
    }

    .button-container {
        margin-top: 15px;
    }

    #start-button {
        padding: 15px 30px;
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        color: #fff;
        background: linear-gradient(45deg, #4CAF50, #3e8e41);
        border: none;
        border-radius: 10px;
        transition: transform 0.3s, background-color 0.3s;
    }

    #start-button:hover {
        transform: scale(1.1);
        background: linear-gradient(45deg, #45a049, #397e3c);
    }

    .memory-puzzle-container {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-image: url('storage/bg-gae.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .memory-puzzle-container .container {
        text-align: center;
        margin-top: 50px;
    }

    .memory-puzzle-container h1 {
        padding-top: 10px;
        font-size: 24px;
        color: #ccc;
        border-radius: 50%;
    }

    .memory-puzzle-container .game-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 70vh;
    }

    .memory-puzzle-container .game-board {
        padding-top: 20px;
        display: grid;
        grid-template-columns: repeat(4, 100px);
        gap: 10px;
        justify-content: center;
    }

    .memory-puzzle-container .card {
        width: 100px;
        position: relative;
        height: 100px;
        background-color: #ccc;
        border-radius: 5px;
        cursor: pointer;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: filter 0.3s;
    }

    .memory-puzzle-container .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(254, 214, 214, 0.164);
        border-radius: 1px;
    }

    .memory-puzzle-container .card.flipped {
        background-color: transparent;
    }

    .memory-puzzle-container .card.flipped img {
        display: block;
    }

    .memory-puzzle-container .card img {
        display: none;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .memory-puzzle-container .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.945);
        border-radius: 5px;
    }

    .memory-puzzle-container .card.flipped {
        filter: blur(0);
    }

    .memory-puzzle-container button {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .memory-puzzle-container button:hover {
        background-color: #45a049;
    }

    .memory-puzzle-container .notification-popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.8);
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        z-index: 1000;
    }

    .memory-puzzle-container .notification-popup .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #fff;
        cursor: pointer;
    }

    .memory-puzzle-container .backbutton-style {
        padding: 10px 20px;
        margin-bottom: 50px;
        font-size: 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .memory-puzzle-container .backbutton-style:hover {
        background-color: #45a049;
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startButton = document.getElementById('start-button');
        const gameBoard = document.querySelector('.game-board');
        const backgroundMusic = document.getElementById('background-music');

        let cards = [];
        let flippedCards = [];

        const cardImages = [
            '{{ asset('storage/1.png') }}',
            '{{ asset('storage/2.png') }}',
            '{{ asset('storage/3.png') }}',
            '{{ asset('storage/4.png') }}',
            '{{ asset('storage/5.png') }}',
            '{{ asset('storage/6.png') }}',
            '{{ asset('storage/7.png') }}',
            '{{ asset('storage/8.png') }}'
        ];

        function createCard(image) {
            const card = document.createElement('div');
            card.classList.add('card');
            const img = document.createElement('img');
            img.src = image;
            card.appendChild(img);
            return card;
        }

        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        function generateGameBoard() {
            gameBoard.innerHTML = '';
            const shuffledImages = shuffleArray(cardImages.concat(cardImages));
            shuffledImages.forEach(image => {
                const card = createCard(image);
                cards.push(card);
                gameBoard.appendChild(card);
            });
        }

        function handleCardClick(card) {
            if (!card.classList.contains('flipped') && flippedCards.length < 2) {
                card.classList.add('flipped');
                flippedCards.push(card);
                if (flippedCards.length === 2) {
                    checkMatch();
                }
            }
        }

        function checkMatch() {
            const firstCard = flippedCards[0];
            const secondCard = flippedCards[1];

            const firstImage = firstCard.querySelector('img').src;
            const secondImage = secondCard.querySelector('img').src;

            if (firstImage === secondImage) {
                flippedCards = [];
            } else {
                setTimeout(() => {
                    firstCard.classList.remove('flipped');
                    secondCard.classList.remove('flipped');
                    flippedCards = [];
                }, 1000);
            }
            checkWin();
        }

        function checkWin() {
            const matchedCards = document.querySelectorAll('.card.flipped');
            if (matchedCards.length === cards.length) {
                showCongratulationsPopup();
            }
        }


        function closeNotificationPopup() {
            const notificationPopup = document.querySelector('.notification-popup');
            notificationPopup.remove();
        }

        startButton.addEventListener('click', function() {
            generateGameBoard();
            startButton.style.display = 'none';
        });

        gameBoard.addEventListener('click', function(event) {
            const clickedCard = event.target.closest('.card');
            if (clickedCard) {
                handleCardClick(clickedCard);
            }
        });

    });

    document.addEventListener('DOMContentLoaded', function() {
        const startButton = document.getElementById('start-button');
        const backgroundMusic = document.getElementById('background-music');
        startButton.addEventListener('click', function() {
            backgroundMusic.play();
        });
    });
</script>
