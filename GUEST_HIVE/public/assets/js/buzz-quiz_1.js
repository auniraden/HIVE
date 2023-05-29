/*----------------------------------------------------------Beginner level---------------------------------------*/
var questions = [{
    question: "1. What is the correct form of the verb 'to be' in the present tense for the pronoun 'he' ?",
    answers:{
      A: " am",
      B: " is",
      C: " are",
    },
    correctAnswer: "B"
  },
  {
    question: "2. Which word is a synonym for 'happy'?",
    answers:{
      A: " sad",
      B: " angry",
      C: " joyful",
    },
    correctAnswer: "C"
  },
  {
    question: "3. What is the plural form of the word 'cat'?",
    answers:{
      A: " cats",
      B: " caties",
      C: " catz",
    },
    correctAnswer: "A"
  },
  {
    question: "4. Choose the correct sentence:",
    answers:{
      A: " I goed to the store.",
      B: " I went to skate at the park yesterday.",
      C: " I went to the park tomorrow too.",
    },
    correctAnswer: "B"
  },
  {
    question: "5. What is the opposite of the word 'hot'?",
    answers:{
      A: " warm",
      B: " cool",
      C: " cold",
    },
    correctAnswer: "C"
  },
  {
    question: "6. Which word is a pronoun?",
    answers:{
      A: " book",
      B: " they",
      C: " run",
    },
    correctAnswer: "B"
  },
  {
    question: "7. Which word is the past tense of the verb 'to eat'?",
    answers:{
      A: " ate",
      B: " eated",
      C: " eat",
    },
    correctAnswer: "A"
  },
  {
    question: "8. Choose the correct spelling:",
    answers:{
      A: " recieve",
      B: " receive",
      C: " receeve",
    },
    correctAnswer: "B"
  },
  {
    question: "9. Which word is a preposition?",
    answers:{
      A: " happy",
      B: " in",
      C: " jump",
    },
    correctAnswer: "B"
  },
  {
    question: "10. Which word is a conjunction?",
    answers:{
      A: " and",
      B: " run",
      C: " happy",
    },
    correctAnswer: "A"
  }  
  ];
  
  var quizContainer = document.getElementById("quiz");
  var submitButton = document.getElementById("submit");
  var resultsContainer = document.getElementById("results"); 

  makeQuiz(questions, quizContainer, resultsContainer, submitButton);

  function makeQuiz(questions, quizContainer, resultsContainer, submitButton){
    function showQuestions(questions, quizContainer){
      var output = [];
      var answers;
      
      for(i=0; i<questions.length; i++){
        answers = [];
        
        // for each answer, add an html radio button
      for (var letter in questions[i].answers) {
        answers.push(
          "<label>" +
            "<input type='radio' name='question" + i + "' value='" + letter + "'>" +
            letter + ": " +
            questions[i].answers[letter] +
            "</label>"
        );
        }
        //to answer the question, the browser need to add that questions and its answer to the output
        output.push(
          "<div class='question'>" + questions[i].question + "</div>"
          + "<div class='answers'>" + answers.join("") + "</div>"
        );
      }
      //to add the result for each question together
      quizContainer.innerHTML = output.join('');
    }
    
    // Get the reset button element
    var resetButton = document.getElementById("reset");
    
    // Add an event listener to the reset button
    resetButton.addEventListener("click", resetQuiz);
    
    // Function to reset the quiz
    function resetQuiz() {
        // Clear the selected answers
        var answerInputs = document.querySelectorAll("input[type='radio']:checked");
        answerInputs.forEach(function(input) {
            input.checked = false;
        });
        
        // Clear the results
        var resultsContainer = document.getElementById("results");
        resultsContainer.innerHTML = "";
        
        // Show the questions again
        showQuestions(questions, quizContainer);
    }


    //to show the result
    function showResults(questions, quizContainer, resultsContainer){
      var answerContainers = quizContainer.querySelectorAll(".answers");
      var userAnswer = "";
      var numCorrect = 0;

      //as long as still got questions
      for(var i=0; i<questions.length; i++){
        //which answer user selected
        userAnswer = (answerContainers[i].querySelector("input[name=question"+i+"]:checked")||{}).value;

        //if answer is wrong or correct
        if(userAnswer===questions[i].correctAnswer){
          numCorrect++;
          answerContainers[i].style.color = "#1CCA91";
        }
        else{
          answerContainers[i].style.color = "red";
        }
    }
    //what to show: user score
    resultsContainer.innerHTML = numCorrect + " out of " + questions.length + " correct.";
    
    //recommend which level the user should sign up for
    if (numCorrect >= 7){
        resultsContainer.innerHTML += "<br>👏 Buzz, buzz! 👏 Congratulations! You should <a href='sign_up.php'>sign up</a> for the Intermediate or Advanced level course.🐝🍯";
    }else {
        resultsContainer.innerHTML += "<br>✨ Great effort! ✨ You should <a href='sign_up.php'>sign up</a> and start your journey at this Beginner level course. 🐝🍯 ";
    }
}
    //show all questions at once
    showQuestions(questions, quizContainer);
    submitButton.onclick = function(){
      showResults(questions, quizContainer, resultsContainer);
    }
}
