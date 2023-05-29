var questions = [{
    question: "1. What is the correct form of the verb 'to be' in the passive voice for the sentence 'They built the house.'?",
    answers:{
      A: " They are building the house.",
      B: " The house is building by them.",
      C: " The house was built by them.",
      D: " The house is built by them."
    },
    correctAnswer: "C"
  },
  {
    question: "2. Choose the correct sentence:",
    answers:{
      A: " She has been working here since two years.",
      B: " She has worked here for two years.",
      C: " She has working here for two years.",
      D: " She has been working here for two years."
    },
    correctAnswer: "B"
  },
  {
    question: "3. What is the meaning og the word 'exacerbate'?",
    answers:{
      A: " to improve",
      B: " to alleviate",
      C: " to worsen",
      D: " to analyze"
    },
    correctAnswer: "C"
  },
  {
    question: "4. Which word is a synonym for 'ephemeral'?",
    answers:{
      A: " enduring",
      B: " forever",
      C: " everlasting",
      D: " fleeting"
    },
    correctAnswer: "D"
  },
  {
    question: "5. What is the past participle of the verb 'lie' (meaning to lean)?",
    answers:{
      A: " lied",
      B: " lain",
      C: " lay",
      D: " lying"
    },
    correctAnswer: "B"
  },
  {
    question: "6. Choose the correct sentence:",
    answers:{
      A: " We have discussing this topic for hours.",
      B: " We have discussed this topic for hours.",
      C: " We have been discussing this topic for hours.",
      D: " We have been discussed this topic for hours."
    },
    correctAnswer: "B"
  },
  {
    question: "7. What is the antonym of the word 'enigma'?",
    answers:{
      A: " puzzle",
      B: " mystery",
      C: " solution",
      D: " riddle"
    },
    correctAnswer: "C"
  },
  {
    question: "8. Which word is an interjection?",
    answers:{
      A: " study",
      B: " indeed",
      C: " knowledge",
      D: " think"
    },
    correctAnswer: "B"
  },
  {
    question: "9. What is the correct form of the verb 'to go' in the past present tense for the pronoun 'we' ?",
    answers:{
      A: " gone",
      B: " went",
      C: " have gone",
      D: " had gone"
    },
    correctAnswer: "D"
  },
  {
    question: "10. Which word is a synonym for 'prolific'?",
    answers:{
      A: " unproductive",
      B: " barren",
      C: " abundant",
      D: " infertile"
    },
    correctAnswer: "C"
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
        resultsContainer.innerHTML += "<br>👏 Buzz, buzz! 👏 Congratulations! Bee a <a href='contribute.php'>contributor</a> and share your knowledge with others too!🐝🍯";
    }else {
        resultsContainer.innerHTML += "<br>✨ Great effort! ✨ You should <a href='sign_up.php'>sign up</a> and start your journey at Intermediate level course. 🐝🍯 ";
    }
}
    //show all questions at once
    showQuestions(questions, quizContainer);
    submitButton.onclick = function(){
      showResults(questions, quizContainer, resultsContainer);
    }
}
