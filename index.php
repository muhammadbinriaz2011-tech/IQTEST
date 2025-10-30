<?php
// IQ Test Platform - Single File Implementation
// Session Management
session_start();
if (!isset($_SESSION['session_id'])) {
    $_SESSION['session_id'] = uniqid('iq_test_', true);
}

$session_id = $_SESSION['session_id'];

// Handle AJAX requests
if (isset($_POST['action'])) {
    header('Content-Type: application/json');
    
    switch ($_POST['action']) {
        case 'get_question':
            // Questions array - no database dependency
            $questions = [
                ['id' => 1, 'question_text' => 'If all cats are animals and some animals are pets, which statement is true?', 'option_a' => 'All cats are pets', 'option_b' => 'Some cats are pets', 'option_c' => 'No cats are pets', 'option_d' => 'All pets are cats', 'correct_answer' => 'B', 'category' => 'Logical Reasoning'],
                ['id' => 2, 'question_text' => 'Complete the sequence: 2, 4, 8, 16, ?', 'option_a' => '20', 'option_b' => '24', 'option_c' => '32', 'option_d' => '28', 'correct_answer' => 'C', 'category' => 'Numerical'],
                ['id' => 3, 'question_text' => 'If RED = 18, BLUE = 21, what does GREEN equal?', 'option_a' => '32', 'option_b' => '33', 'option_c' => '34', 'option_d' => '35', 'correct_answer' => 'C', 'category' => 'Pattern Recognition'],
                ['id' => 4, 'question_text' => 'Which number should come next in the series: 1, 1, 2, 3, 5, 8, ?', 'option_a' => '11', 'option_b' => '12', 'option_c' => '13', 'option_d' => '14', 'correct_answer' => 'C', 'category' => 'Numerical'],
                ['id' => 5, 'question_text' => 'If a train travels 60 miles in 1 hour, how far will it travel in 2.5 hours?', 'option_a' => '120 miles', 'option_b' => '130 miles', 'option_c' => '150 miles', 'option_d' => '160 miles', 'correct_answer' => 'C', 'category' => 'Numerical'],
                ['id' => 6, 'question_text' => 'Look at the pattern: O, T, T, F, F, S, S, E, N, ? What comes next?', 'option_a' => 'T', 'option_b' => 'E', 'option_c' => 'V', 'option_d' => 'O', 'correct_answer' => 'A', 'category' => 'Pattern Recognition'],
                ['id' => 7, 'question_text' => 'Complete the pattern: 1, 4, 9, 16, 25, ?', 'option_a' => '30', 'option_b' => '35', 'option_c' => '36', 'option_d' => '40', 'correct_answer' => 'C', 'category' => 'Pattern Recognition'],
                ['id' => 8, 'question_text' => 'Which shape completes the pattern: Circle, Square, Triangle, Circle, Square, ?', 'option_a' => 'Triangle', 'option_b' => 'Circle', 'option_c' => 'Square', 'option_d' => 'Rectangle', 'correct_answer' => 'A', 'category' => 'Pattern Recognition'],
                ['id' => 9, 'question_text' => 'If you have 12 apples and you give away 1/3 of them, how many do you have left?', 'option_a' => '6', 'option_b' => '8', 'option_c' => '9', 'option_d' => '10', 'correct_answer' => 'B', 'category' => 'Problem Solving'],
                ['id' => 10, 'question_text' => 'A clock shows 3:15. What is the angle between the hour and minute hands?', 'option_a' => '0 degrees', 'option_b' => '7.5 degrees', 'option_c' => '15 degrees', 'option_d' => '30 degrees', 'correct_answer' => 'B', 'category' => 'Problem Solving'],
                ['id' => 11, 'question_text' => 'If 5 machines can make 5 widgets in 5 minutes, how many machines are needed to make 100 widgets in 100 minutes?', 'option_a' => '5', 'option_b' => '10', 'option_c' => '20', 'option_d' => '100', 'correct_answer' => 'A', 'category' => 'Problem Solving'],
                ['id' => 12, 'question_text' => 'Which word does not belong: Apple, Orange, Carrot, Banana', 'option_a' => 'Apple', 'option_b' => 'Orange', 'option_c' => 'Carrot', 'option_d' => 'Banana', 'correct_answer' => 'C', 'category' => 'Logical Reasoning'],
                ['id' => 13, 'question_text' => 'Complete the analogy: Book is to Library as Car is to ?', 'option_a' => 'Garage', 'option_b' => 'Road', 'option_c' => 'Driver', 'option_d' => 'Engine', 'correct_answer' => 'A', 'category' => 'Logical Reasoning'],
                ['id' => 14, 'question_text' => 'If A = 1, B = 2, C = 3, what does CAT equal?', 'option_a' => '24', 'option_b' => '25', 'option_c' => '26', 'option_d' => '27', 'correct_answer' => 'A', 'category' => 'Pattern Recognition'],
                ['id' => 15, 'question_text' => 'What number comes next: 3, 6, 12, 24, ?', 'option_a' => '36', 'option_b' => '42', 'option_c' => '48', 'option_d' => '54', 'correct_answer' => 'C', 'category' => 'Numerical'],
                ['id' => 16, 'question_text' => 'If you fold a piece of paper in half 3 times, how many sections do you have?', 'option_a' => '4', 'option_b' => '6', 'option_c' => '8', 'option_d' => '9', 'correct_answer' => 'C', 'category' => 'Problem Solving'],
                ['id' => 17, 'question_text' => 'Which is the odd one out: Monday, Tuesday, Wednesday, Weekend', 'option_a' => 'Monday', 'option_b' => 'Tuesday', 'option_c' => 'Wednesday', 'option_d' => 'Weekend', 'correct_answer' => 'D', 'category' => 'Logical Reasoning'],
                ['id' => 18, 'question_text' => 'Complete the sequence: Z, Y, X, W, V, ?', 'option_a' => 'U', 'option_b' => 'T', 'option_c' => 'S', 'option_d' => 'R', 'correct_answer' => 'A', 'category' => 'Pattern Recognition'],
                ['id' => 19, 'question_text' => 'If 2 + 2 = 4, 3 + 3 = 6, what does 4 + 4 equal?', 'option_a' => '8', 'option_b' => '9', 'option_c' => '10', 'option_d' => '11', 'correct_answer' => 'A', 'category' => 'Numerical'],
                ['id' => 20, 'question_text' => 'A farmer has 17 sheep. All but 9 die. How many are left?', 'option_a' => '8', 'option_b' => '9', 'option_c' => '17', 'option_d' => '26', 'correct_answer' => 'B', 'category' => 'Problem Solving']
            ];
            
            $question_num = (int)$_POST['question_num'];
            
            if ($question_num >= 1 && $question_num <= count($questions)) {
                echo json_encode($questions[$question_num - 1]);
            } else {
                echo json_encode(['error' => 'No more questions']);
            }
            exit;
            
        case 'submit_answer':
            // Store answer in session instead of database
            $question_id = (int)$_POST['question_id'];
            $user_answer = $_POST['user_answer'];
            
            // Questions array for getting correct answer
            $questions = [
                ['id' => 1, 'correct_answer' => 'B'], ['id' => 2, 'correct_answer' => 'C'], ['id' => 3, 'correct_answer' => 'C'],
                ['id' => 4, 'correct_answer' => 'C'], ['id' => 5, 'correct_answer' => 'C'], ['id' => 6, 'correct_answer' => 'A'],
                ['id' => 7, 'correct_answer' => 'C'], ['id' => 8, 'correct_answer' => 'A'], ['id' => 9, 'correct_answer' => 'B'],
                ['id' => 10, 'correct_answer' => 'B'], ['id' => 11, 'correct_answer' => 'A'], ['id' => 12, 'correct_answer' => 'C'],
                ['id' => 13, 'correct_answer' => 'A'], ['id' => 14, 'correct_answer' => 'A'], ['id' => 15, 'correct_answer' => 'C'],
                ['id' => 16, 'correct_answer' => 'C'], ['id' => 17, 'correct_answer' => 'D'], ['id' => 18, 'correct_answer' => 'A'],
                ['id' => 19, 'correct_answer' => 'A'], ['id' => 20, 'correct_answer' => 'B']
            ];
            
            $correct_answer = '';
            foreach ($questions as $q) {
                if ($q['id'] == $question_id) {
                    $correct_answer = $q['correct_answer'];
                    break;
                }
            }
            
            $is_correct = ($user_answer === $correct_answer);
            
            // Store answer in session
            if (!isset($_SESSION['answers'])) {
                $_SESSION['answers'] = [];
            }
            $_SESSION['answers'][$question_id] = [
                'user_answer' => $user_answer,
                'is_correct' => $is_correct
            ];
            
            echo json_encode(['correct' => $is_correct, 'correct_answer' => $correct_answer]);
            exit;
            
        case 'get_results':
            // Calculate score from session data
            $correct_count = 0;
            $total_questions = 0;
            
            if (isset($_SESSION['answers'])) {
                foreach ($_SESSION['answers'] as $answer) {
                    $total_questions++;
                    if ($answer['is_correct']) {
                        $correct_count++;
                    }
                }
            }
            
            // Calculate IQ score (simplified formula: (correct/total) * 160)
            $iq_score = $total_questions > 0 ? round(($correct_count / $total_questions) * 160) : 0;
            
            // Generate feedback
            $feedback = generateFeedback($iq_score, $correct_count, $total_questions);
            
            echo json_encode([
                'iq_score' => $iq_score,
                'correct_answers' => $correct_count,
                'total_questions' => $total_questions,
                'percentage' => $total_questions > 0 ? round(($correct_count / $total_questions) * 100) : 0,
                'feedback' => $feedback
            ]);
            exit;
            
        case 'reset_test':
            // Clear session data
            unset($_SESSION['answers']);
            $_SESSION['session_id'] = uniqid('iq_test_', true);
            echo json_encode(['success' => true, 'new_session' => $_SESSION['session_id']]);
            exit;
    }
}

// Generate personalized feedback
function generateFeedback($iq_score, $correct_count, $total_questions) {
    $percentage = $total_questions > 0 ? ($correct_count / $total_questions) * 100 : 0;
    
    if ($iq_score >= 130) {
        return [
            'level' => 'Exceptional',
            'description' => 'Your IQ score indicates exceptional cognitive abilities. You demonstrate superior reasoning, problem-solving, and analytical skills.',
            'strengths' => ['Logical reasoning', 'Pattern recognition', 'Problem-solving', 'Abstract thinking'],
            'recommendations' => ['Consider advanced studies in mathematics or science', 'Explore complex puzzles and strategy games', 'Mentor others to develop their cognitive skills']
        ];
    } elseif ($iq_score >= 115) {
        return [
            'level' => 'Above Average',
            'description' => 'Your IQ score shows above-average cognitive abilities. You have strong reasoning and analytical skills.',
            'strengths' => ['Good logical reasoning', 'Decent pattern recognition', 'Solid problem-solving'],
            'recommendations' => ['Continue challenging yourself with complex problems', 'Practice mental math regularly', 'Read analytical and technical materials']
        ];
    } elseif ($iq_score >= 85) {
        return [
            'level' => 'Average',
            'description' => 'Your IQ score falls within the average range. You have solid cognitive abilities with room for improvement.',
            'strengths' => ['Basic reasoning skills', 'Some pattern recognition'],
            'recommendations' => ['Practice puzzles and brain games', 'Study mathematics and logic', 'Engage in analytical reading']
        ];
    } else {
        return [
            'level' => 'Below Average',
            'description' => 'Your IQ score indicates areas for improvement. Focus on developing your cognitive skills through practice.',
            'strengths' => ['Basic problem-solving'],
            'recommendations' => ['Start with simple puzzles and gradually increase difficulty', 'Practice basic math and logic daily', 'Consider cognitive training exercises']
        ];
    }
}

// Get current page
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test Platform</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px;
            margin: 20px 0;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            color: #4a5568;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5em;
        }

        h2 {
            color: #2d3748;
            margin-bottom: 20px;
            font-size: 1.8em;
        }

        .btn {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 1.1em;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            margin: 10px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-secondary {
            background: linear-gradient(45deg, #48bb78, #38a169);
        }

        .btn-danger {
            background: linear-gradient(45deg, #f56565, #e53e3e);
        }

        .question-container {
            display: none;
        }

        .question-container.active {
            display: block;
        }

        .question {
            font-size: 1.3em;
            margin-bottom: 30px;
            color: #2d3748;
            line-height: 1.8;
        }

        .options {
            list-style: none;
        }

        .options li {
            margin: 15px 0;
        }

        .option {
            display: block;
            width: 100%;
            padding: 15px 20px;
            background: #f7fafc;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.1em;
        }

        .option:hover {
            background: #edf2f7;
            border-color: #667eea;
        }

        .option.selected {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e2e8f0;
            border-radius: 4px;
            margin: 20px 0;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            width: 0%;
            transition: width 0.3s ease;
        }

        .timer {
            text-align: center;
            font-size: 1.2em;
            color: #4a5568;
            margin: 20px 0;
        }

        .results-container {
            text-align: center;
        }

        .iq-score {
            font-size: 4em;
            font-weight: bold;
            color: #667eea;
            margin: 20px 0;
        }

        .score-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .score-item {
            background: #f7fafc;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }

        .feedback-section {
            text-align: left;
            margin: 30px 0;
        }

        .strengths, .recommendations {
            margin: 20px 0;
        }

        .strengths ul, .recommendations ul {
            margin-left: 20px;
        }

        .strengths li, .recommendations li {
            margin: 8px 0;
            color: #4a5568;
        }

        .loading {
            text-align: center;
            padding: 40px;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #667eea;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .error {
            color: #e53e3e;
            background: #fed7d7;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
        }

        .success {
            color: #38a169;
            background: #c6f6d5;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .card {
                padding: 20px;
                margin: 10px 0;
            }

            h1 {
                font-size: 2em;
            }

            h2 {
                font-size: 1.5em;
            }

            .btn {
                padding: 12px 25px;
                font-size: 1em;
                width: 100%;
                margin: 5px 0;
            }

            .iq-score {
                font-size: 3em;
            }

            .score-details {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.8em;
            }

            .question {
                font-size: 1.1em;
            }

            .option {
                padding: 12px 15px;
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($page === 'home'): ?>
            <!-- Homepage -->
            <div class="card">
                <h1>🧠 IQ Test Platform</h1>
                <div style="text-align: center; margin-bottom: 30px;">
                    <p style="font-size: 1.2em; color: #4a5568; margin-bottom: 20px;">
                        Welcome to our comprehensive Intelligence Quotient (IQ) test platform. 
                        This scientifically designed assessment evaluates your cognitive abilities 
                        including logical reasoning, pattern recognition, and problem-solving skills.
                    </p>
                    <div style="background: #f7fafc; padding: 20px; border-radius: 10px; margin: 20px 0;">
                        <h3 style="color: #2d3748; margin-bottom: 15px;">What You'll Be Tested On:</h3>
                        <ul style="text-align: left; display: inline-block; color: #4a5568;">
                            <li>🧮 Numerical reasoning and mathematical patterns</li>
                            <li>🔍 Logical reasoning and deductive thinking</li>
                            <li>🎯 Pattern recognition and sequence completion</li>
                            <li>🧩 Problem-solving and analytical skills</li>
                        </ul>
                    </div>
                    <p style="font-size: 1.1em; color: #4a5568;">
                        The test consists of 20 carefully crafted questions designed to assess 
                        different aspects of your cognitive abilities. Take your time and 
                        choose the answers that seem most logical to you.
                    </p>
                </div>
                <div style="text-align: center;">
                    <a href="?page=quiz" class="btn">🚀 Start IQ Test</a>
                </div>
            </div>

        <?php elseif ($page === 'quiz'): ?>
            <!-- Quiz Page -->
            <div class="card">
                <div class="progress-bar">
                    <div class="progress-fill" id="progressFill"></div>
                </div>
                <div class="timer" id="timer">Time: 00:00</div>
                
                <div class="question-container active" id="questionContainer">
                    <div class="loading">
                        <div class="spinner"></div>
                        <p>Loading question...</p>
                    </div>
                </div>
                
                <div style="text-align: center; margin-top: 30px;">
                    <button class="btn btn-secondary" id="nextBtn" onclick="nextQuestion()" style="display: none;">
                        Next Question
                    </button>
                    <button class="btn btn-danger" id="finishBtn" onclick="finishTest()" style="display: none;">
                        Finish Test
                    </button>
                </div>
            </div>

        <?php elseif ($page === 'results'): ?>
            <!-- Results Page -->
            <div class="card results-container">
                <h1>🎉 Test Results</h1>
                <div class="loading">
                    <div class="spinner"></div>
                    <p>Calculating your results...</p>
                </div>
                <div id="resultsContent" style="display: none;">
                    <div class="iq-score" id="iqScore">0</div>
                    <h2 id="levelTitle">Your IQ Level</h2>
                    
                    <div class="score-details">
                        <div class="score-item">
                            <h3>Correct Answers</h3>
                            <p id="correctAnswers">0</p>
                        </div>
                        <div class="score-item">
                            <h3>Total Questions</h3>
                            <p id="totalQuestions">0</p>
                        </div>
                        <div class="score-item">
                            <h3>Percentage</h3>
                            <p id="percentage">0%</p>
                        </div>
                    </div>
                    
                    <div class="feedback-section" id="feedbackSection">
                        <!-- Feedback will be populated by JavaScript -->
                    </div>
                    
                    <div style="text-align: center; margin-top: 40px;">
                        <a href="?page=home" class="btn">🏠 Home</a>
                        <button class="btn btn-secondary" onclick="retakeTest()">🔄 Retake Test</button>
                        <button class="btn btn-secondary" onclick="shareResults()">📤 Share Results</button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script>
        // Global variables
        let currentQuestion = 1;
        let totalQuestions = 20;
        let selectedAnswer = null;
        let startTime = Date.now();
        let timerInterval;

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            const page = new URLSearchParams(window.location.search).get('page');
            
            if (page === 'quiz') {
                startTimer();
                loadQuestion(currentQuestion);
            } else if (page === 'results') {
                loadResults();
            }
        });

        // Timer functionality
        function startTimer() {
            timerInterval = setInterval(function() {
                const elapsed = Date.now() - startTime;
                const minutes = Math.floor(elapsed / 60000);
                const seconds = Math.floor((elapsed % 60000) / 1000);
                document.getElementById('timer').textContent = 
                    `Time: ${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            }, 1000);
        }

        // Load question
        function loadQuestion(questionNum) {
            fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=get_question&question_num=${questionNum}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('questionContainer').innerHTML = 
                        '<div class="error">No more questions available.</div>';
                    return;
                }
                
                // Store the question ID for later use
                window.currentQuestionId = data.id;
                displayQuestion(data);
                updateProgress();
            })
            .catch(error => {
                console.error('Error loading question:', error);
                document.getElementById('questionContainer').innerHTML = 
                    '<div class="error">Error loading question. Please try again.</div>';
            });
        }

        // Display question
        function displayQuestion(question) {
            const container = document.getElementById('questionContainer');
            container.innerHTML = `
                <div class="question">
                    <strong>Question ${currentQuestion} of ${totalQuestions}</strong><br><br>
                    ${question.question_text}
                </div>
                <ul class="options">
                    <li><button class="option" onclick="selectAnswer('A')" data-option="A">A) ${question.option_a}</button></li>
                    <li><button class="option" onclick="selectAnswer('B')" data-option="B">B) ${question.option_b}</button></li>
                    <li><button class="option" onclick="selectAnswer('C')" data-option="C">C) ${question.option_c}</button></li>
                    <li><button class="option" onclick="selectAnswer('D')" data-option="D">D) ${question.option_d}</button></li>
                </ul>
            `;
            
            selectedAnswer = null;
            document.getElementById('nextBtn').style.display = 'none';
            document.getElementById('finishBtn').style.display = 'none';
        }

        // Select answer
        function selectAnswer(answer) {
            // Remove previous selection
            document.querySelectorAll('.option').forEach(option => {
                option.classList.remove('selected');
            });
            
            // Select new answer
            document.querySelector(`[data-option="${answer}"]`).classList.add('selected');
            selectedAnswer = answer;
            
            // Show appropriate button
            if (currentQuestion < totalQuestions) {
                document.getElementById('nextBtn').style.display = 'inline-block';
            } else {
                document.getElementById('finishBtn').style.display = 'inline-block';
            }
        }

        // Next question
        function nextQuestion() {
            if (!selectedAnswer) {
                alert('Please select an answer before proceeding.');
                return;
            }
            
            submitAnswer();
            currentQuestion++;
            loadQuestion(currentQuestion);
        }

        // Submit answer
        function submitAnswer() {
            const questionId = getCurrentQuestionId();
            
            fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=submit_answer&question_id=${questionId}&user_answer=${selectedAnswer}`
            })
            .then(response => response.json())
            .then(data => {
                // Answer submitted successfully
            })
            .catch(error => {
                console.error('Error submitting answer:', error);
            });
        }

        // Get current question ID
        function getCurrentQuestionId() {
            return window.currentQuestionId || currentQuestion;
        }

        // Finish test
        function finishTest() {
            if (!selectedAnswer) {
                alert('Please select an answer before finishing.');
                return;
            }
            
            submitAnswer();
            clearInterval(timerInterval);
            window.location.href = '?page=results';
        }

        // Update progress bar
        function updateProgress() {
            const progress = (currentQuestion / totalQuestions) * 100;
            document.getElementById('progressFill').style.width = progress + '%';
        }

        // Load results
        function loadResults() {
            fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=get_results'
            })
            .then(response => response.json())
            .then(data => {
                displayResults(data);
            })
            .catch(error => {
                document.querySelector('.loading').innerHTML = 
                    '<div class="error">Error loading results. Please try again.</div>';
            });
        }

        // Display results
        function displayResults(data) {
            document.querySelector('.loading').style.display = 'none';
            document.getElementById('resultsContent').style.display = 'block';
            
            document.getElementById('iqScore').textContent = data.iq_score;
            document.getElementById('correctAnswers').textContent = data.correct_answers;
            document.getElementById('totalQuestions').textContent = data.total_questions;
            document.getElementById('percentage').textContent = data.percentage + '%';
            document.getElementById('levelTitle').textContent = data.feedback.level + ' Intelligence';
            
            // Display feedback
            const feedbackSection = document.getElementById('feedbackSection');
            feedbackSection.innerHTML = `
                <h3>📊 Your Performance Analysis</h3>
                <p style="font-size: 1.1em; color: #4a5568; margin-bottom: 20px;">${data.feedback.description}</p>
                
                <div class="strengths">
                    <h4>💪 Your Strengths:</h4>
                    <ul>
                        ${data.feedback.strengths.map(strength => `<li>${strength}</li>`).join('')}
                    </ul>
                </div>
                
                <div class="recommendations">
                    <h4>🎯 Recommendations for Improvement:</h4>
                    <ul>
                        ${data.feedback.recommendations.map(rec => `<li>${rec}</li>`).join('')}
                    </ul>
                </div>
            `;
        }

        // Retake test
        function retakeTest() {
            if (confirm('Are you sure you want to retake the test? This will reset your current results.')) {
                fetch('', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'action=reset_test'
                })
                .then(response => response.json())
                .then(data => {
                    window.location.href = '?page=quiz';
                })
                .catch(error => {
                    alert('Error resetting test. Please try again.');
                });
            }
        }

        // Share results
        function shareResults() {
            const iqScore = document.getElementById('iqScore').textContent;
            const level = document.getElementById('levelTitle').textContent;
            
            const shareText = `I just completed an IQ test and scored ${iqScore} (${level})! 🧠 Try it yourself!`;
            
            if (navigator.share) {
                navigator.share({
                    title: 'My IQ Test Results',
                    text: shareText,
                    url: window.location.origin
                });
            } else {
                // Fallback - copy to clipboard
                navigator.clipboard.writeText(shareText).then(() => {
                    alert('Results copied to clipboard!');
                }).catch(() => {
                    prompt('Copy this text to share your results:', shareText);
                });
            }
        }
    </script>
</body>
</html>
