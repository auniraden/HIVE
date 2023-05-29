var questions = [{
    question: "1. What is the correct form of the verb 'to be' in the present tense for the pronoun 'I' ?",
    answers:{
      A: " am",
      B: " is",
      C: " has been",
      D: " have been"
    },
    correctAnswer: "D"
  },
  {
    question: "2. Choose the correct sentence:",
    answers:{
      A: " I went to the party tomorrow.",
      B: " I will go to the party tomorrow.",
      C: " I will going to the party tomorrow.",
      D: " I will gone to the party tomorrow."
    },
    correctAnswer: "B"
  },
  {
    question: "3. What is the meaning og the word 'eloquent'?",
    answers:{
      A: " shy",
      B: " talkative",
      C: " fluent and persuasive in speaking or writing",
      D: " quiet"
    },
    correctAnswer: "C"
  },
  {
    question: "4. Which word is a synonym for 'admirable'?",
    answers:{
      A: " commendable",
      B: " ordinary",
      C: " inferior",
      D: " mediocre"
    },
    correctAnswer: "A"
  },
  {
    question: "5. What is the past participle of the verb 'swim'?",
    answers:{
      A: " swam",
      B: " swimmed",
      C: " swum",
      D: " swimming"
    },
    correctAnswer: "C"
  },
  {
    question: "6. Choose the correct sentence:",
    answers:{
      A: " She have studied for the test.",
      B: " She has studied for the test.",
      C: " She has study for the test.",
      D: " She have study for the test."
    },
    correctAnswer: "B"
  },
  {
    question: "7. What is the antonym of the word 'generous'?",
    answers:{
      A: " selfish",
      B: " kind",
      C: " giving",
      D: " thoughtful"
    },
    correctAnswer: "A"
  },
  {
    question: "8. Which word is a conjunction?",
    answers:{
      A: " jump",
      B: " and",
      C: " inside",
      D: " walk"
    },
    correctAnswer: "B"
  },
  {
    question: "9. What is the correct form of the verb 'to do' in the present tense for the pronoun 'they' ?",
    answers:{
      A: " did",
      B: " done",
      C: " does",
      D: " doing"
    },
    correctAnswer: "A"
  },
  {
    question: "10. Which word is a synonym for 'persistent'?",
    answers:{
      A: " determined",
      B: " flexible",
      C: " inconsistent",
      D: " unreliable"
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
        resultsContainer.innerHTML += "<br>👏 Buzz, buzz! 👏 Congratulations! You should <a href='sign_up.php'>sign up</a> for Advanced level course.🐝🍯";
    }else {
        resultsContainer.innerHTML += "<br>✨ Great effort! ✨ You should <a href='sign_up.php'>sign up</a> and start your journey at this Intermediate level course. 🐝🍯 ";
    }
}
    //show all questions at once
    showQuestions(questions, quizContainer);
    submitButton.onclick = function(){
      showResults(questions, quizContainer, resultsContainer);
    }
}
