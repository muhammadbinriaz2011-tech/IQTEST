<?php
// Script to insert IQ test questions into database
// Database Configuration
$db_host = 'localhost';
$db_name = 'db19gesbiyoxg0';
$db_user = 'ukrfhh29eellf';
$db_pass = 'jua2ursxz7gb';

// Database Connection
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database connected successfully!<br><br>";
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Clear existing questions
try {
    $pdo->exec("DELETE FROM questions");
    echo "Cleared existing questions.<br>";
} catch(PDOException $e) {
    echo "Note: Could not clear existing questions (table might be empty): " . $e->getMessage() . "<br>";
}

// Questions array
$questions = [
    // Question 1
    [
        'question_text' => 'If all cats are animals and some animals are pets, which statement is true?',
        'option_a' => 'All cats are pets',
        'option_b' => 'Some cats are pets',
        'option_c' => 'No cats are pets',
        'option_d' => 'All pets are cats',
        'correct_answer' => 'B',
        'category' => 'Logical Reasoning',
        'difficulty_level' => 1
    ],
    // Question 2
    [
        'question_text' => 'Complete the sequence: 2, 4, 8, 16, ?',
        'option_a' => '20',
        'option_b' => '24',
        'option_c' => '32',
        'option_d' => '28',
        'correct_answer' => 'C',
        'category' => 'Numerical',
        'difficulty_level' => 1
    ],
    // Question 3
    [
        'question_text' => 'If RED = 18, BLUE = 21, what does GREEN equal?',
        'option_a' => '32',
        'option_b' => '33',
        'option_c' => '34',
        'option_d' => '35',
        'correct_answer' => 'C',
        'category' => 'Pattern Recognition',
        'difficulty_level' => 2
    ],
    // Question 4
    [
        'question_text' => 'Which number should come next in the series: 1, 1, 2, 3, 5, 8, ?',
        'option_a' => '11',
        'option_b' => '12',
        'option_c' => '13',
        'option_d' => '14',
        'correct_answer' => 'C',
        'category' => 'Numerical',
        'difficulty_level' => 2
    ],
    // Question 5
    [
        'question_text' => 'If a train travels 60 miles in 1 hour, how far will it travel in 2.5 hours?',
        'option_a' => '120 miles',
        'option_b' => '130 miles',
        'option_c' => '150 miles',
        'option_d' => '160 miles',
        'correct_answer' => 'C',
        'category' => 'Numerical',
        'difficulty_level' => 1
    ],
    // Question 6
    [
        'question_text' => 'Look at the pattern: O, T, T, F, F, S, S, E, N, ? What comes next?',
        'option_a' => 'T',
        'option_b' => 'E',
        'option_c' => 'V',
        'option_d' => 'O',
        'correct_answer' => 'A',
        'category' => 'Pattern Recognition',
        'difficulty_level' => 3
    ],
    // Question 7
    [
        'question_text' => 'Complete the pattern: 1, 4, 9, 16, 25, ?',
        'option_a' => '30',
        'option_b' => '35',
        'option_c' => '36',
        'option_d' => '40',
        'correct_answer' => 'C',
        'category' => 'Pattern Recognition',
        'difficulty_level' => 2
    ],
    // Question 8
    [
        'question_text' => 'Which shape completes the pattern: Circle, Square, Triangle, Circle, Square, ?',
        'option_a' => 'Triangle',
        'option_b' => 'Circle',
        'option_c' => 'Square',
        'option_d' => 'Rectangle',
        'correct_answer' => 'A',
        'category' => 'Pattern Recognition',
        'difficulty_level' => 1
    ],
    // Question 9
    [
        'question_text' => 'If you have 12 apples and you give away 1/3 of them, how many do you have left?',
        'option_a' => '6',
        'option_b' => '8',
        'option_c' => '9',
        'option_d' => '10',
        'correct_answer' => 'B',
        'category' => 'Problem Solving',
        'difficulty_level' => 1
    ],
    // Question 10
    [
        'question_text' => 'A clock shows 3:15. What is the angle between the hour and minute hands?',
        'option_a' => '0 degrees',
        'option_b' => '7.5 degrees',
        'option_c' => '15 degrees',
        'option_d' => '30 degrees',
        'correct_answer' => 'B',
        'category' => 'Problem Solving',
        'difficulty_level' => 2
    ],
    // Question 11
    [
        'question_text' => 'If 5 machines can make 5 widgets in 5 minutes, how many machines are needed to make 100 widgets in 100 minutes?',
        'option_a' => '5',
        'option_b' => '10',
        'option_c' => '20',
        'option_d' => '100',
        'correct_answer' => 'A',
        'category' => 'Problem Solving',
        'difficulty_level' => 3
    ],
    // Question 12
    [
        'question_text' => 'Which word does not belong: Apple, Orange, Carrot, Banana',
        'option_a' => 'Apple',
        'option_b' => 'Orange',
        'option_c' => 'Carrot',
        'option_d' => 'Banana',
        'correct_answer' => 'C',
        'category' => 'Logical Reasoning',
        'difficulty_level' => 1
    ],
    // Question 13
    [
        'question_text' => 'Complete the analogy: Book is to Library as Car is to ?',
        'option_a' => 'Garage',
        'option_b' => 'Road',
        'option_c' => 'Driver',
        'option_d' => 'Engine',
        'correct_answer' => 'A',
        'category' => 'Logical Reasoning',
        'difficulty_level' => 1
    ],
    // Question 14
    [
        'question_text' => 'If A = 1, B = 2, C = 3, what does CAT equal?',
        'option_a' => '24',
        'option_b' => '25',
        'option_c' => '26',
        'option_d' => '27',
        'correct_answer' => 'A',
        'category' => 'Pattern Recognition',
        'difficulty_level' => 2
    ],
    // Question 15
    [
        'question_text' => 'What number comes next: 3, 6, 12, 24, ?',
        'option_a' => '36',
        'option_b' => '42',
        'option_c' => '48',
        'option_d' => '54',
        'correct_answer' => 'C',
        'category' => 'Numerical',
        'difficulty_level' => 1
    ],
    // Question 16
    [
        'question_text' => 'If you fold a piece of paper in half 3 times, how many sections do you have?',
        'option_a' => '4',
        'option_b' => '6',
        'option_c' => '8',
        'option_d' => '9',
        'correct_answer' => 'C',
        'category' => 'Problem Solving',
        'difficulty_level' => 2
    ],
    // Question 17
    [
        'question_text' => 'Which is the odd one out: Monday, Tuesday, Wednesday, Weekend',
        'option_a' => 'Monday',
        'option_b' => 'Tuesday',
        'option_c' => 'Wednesday',
        'option_d' => 'Weekend',
        'correct_answer' => 'D',
        'category' => 'Logical Reasoning',
        'difficulty_level' => 1
    ],
    // Question 18
    [
        'question_text' => 'Complete the sequence: Z, Y, X, W, V, ?',
        'option_a' => 'U',
        'option_b' => 'T',
        'option_c' => 'S',
        'option_d' => 'R',
        'correct_answer' => 'A',
        'category' => 'Pattern Recognition',
        'difficulty_level' => 1
    ],
    // Question 19
    [
        'question_text' => 'If 2 + 2 = 4, 3 + 3 = 6, what does 4 + 4 equal?',
        'option_a' => '8',
        'option_b' => '9',
        'option_c' => '10',
        'option_d' => '11',
        'correct_answer' => 'A',
        'category' => 'Numerical',
        'difficulty_level' => 1
    ],
    // Question 20
    [
        'question_text' => 'A farmer has 17 sheep. All but 9 die. How many are left?',
        'option_a' => '8',
        'option_b' => '9',
        'option_c' => '17',
        'option_d' => '26',
        'correct_answer' => 'B',
        'category' => 'Problem Solving',
        'difficulty_level' => 2
    ]
];

// Insert questions
$inserted_count = 0;
$stmt = $pdo->prepare("INSERT INTO questions (question_text, option_a, option_b, option_c, option_d, correct_answer, category, difficulty_level) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

foreach ($questions as $question) {
    try {
        $stmt->execute([
            $question['question_text'],
            $question['option_a'],
            $question['option_b'],
            $question['option_c'],
            $question['option_d'],
            $question['correct_answer'],
            $question['category'],
            $question['difficulty_level']
        ]);
        $inserted_count++;
        echo "Inserted question $inserted_count: " . substr($question['question_text'], 0, 50) . "...<br>";
    } catch (PDOException $e) {
        echo "Error inserting question: " . $e->getMessage() . "<br>";
    }
}

echo "<br><strong>Successfully inserted $inserted_count questions!</strong><br><br>";

// Verify insertion
try {
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM questions");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Total questions in database: " . $result['count'] . "<br>";
} catch (PDOException $e) {
    echo "Error counting questions: " . $e->getMessage() . "<br>";
}

echo "<br><a href='index.php'>Go back to IQ Test</a>";
?>
