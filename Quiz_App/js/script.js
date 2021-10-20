
// Accessing Required Elements

        // Buttons
const   goButton = document.querySelector("#goButton"),
        startQuiz = document.querySelector("#startQuiz"),
        nextButton = document.querySelector("#nextButton"),
        exitButton = document.querySelector("#exitButton"),
        home_screen = document.querySelector(".home"),
        quiz__option = document.querySelector(".quiz__option"),
        quiz__questions = document.querySelector(".quiz__questions"),
        quiz__result = document.querySelector(".quiz__result"),
        quiz__info = document.querySelector(".quiz__info"),
        score_earned = document.querySelector("#score_earned");

    let question = document.querySelector(".question"),
        option = document.querySelectorAll(".option"),
        quiz__category = quiz__option.querySelectorAll(".quiz__category"),
        diff__level = quiz__option.querySelectorAll(".diff__level"),
        scoreImage = document.querySelector("#scoreImage");
        time__left = document.querySelector("#time__left");

        
        let index = 0;
        let score = 0;
        
// If Go Button Clicked
goButton.onclick = ()=>{
    home_screen.classList.remove("activeNow");      //hide the Home Screen
    quiz__option.classList.add("activeNow");  //Show the Quiz Option Screen

}
//If Exit Button Clicked
exitButton.onclick = ()=>{
    location.reload();
    // quiz__result.classList.remove("activeNow");  //Show the Quiz Option Screen
    // home_screen.classList.add("activeNow");      //hide the Home Screen
}
// If Start Button Clicked
startQuiz.onclick = ()=>{
    quiz__option.classList.remove("activeNow");  //Show the Quiz Option Screen
    quiz__questions.classList.add("activeNow");  //Show the Quiz Option Screen
    loadQuestion(Quizcategory,QuizdiffLevel);       //Loading question from API
    showQuestion(index++);      //Requesting QUestion

    quiz__info.innerHTML = catName+' | '+QuizdiffLevel;        //Updating Quiz Info

    startTimer(timeValue); //calling startTimer function

}
// If Next Button Clicked
nextButton.onclick = ()=>{
    
    startTimer(timeValue); //calling startTimer function

    if(index<10){
        for(let i=0; i<4; i++){
            option[i].classList.remove('selected');
        }
         //Disabling option to change
        for(let i=0; i<4; i++){
            option[i].classList.remove("disabled");
        }
        nextButton.classList.add("hide");

        showQuestion(index++);



    } else{

        clearInterval(counter); //clear counter

        //If Questions end
        score_earned.innerHTML = score;
        if(score>7){
            scoreImage.src = "static/img/gold.png";
        } else if(score >5){
            scoreImage.src = "static/img/silver.png";
        } else if(score > 3){
            scoreImage.src = "static/img/brownz.png";
        } else{
            scoreImage.src = "static/img/sad.png";
        }
        quiz__questions.classList.remove("activeNow");  //Show the Quiz Option Screen
        quiz__result.classList.add("activeNow");  //Show the Quiz Option Screen
    }
}


//Getting Quiz Category and Quiz Level

        let Quizcategory;
        let QuizdiffLevel;
        let catName;
       
        function quizCat(option, catSelected){
            option.classList.add('selected');
            catName = option.children[1].innerHTML;

            Quizcategory = catSelected;
            console.log(Quizcategory);
             //Disabling option to change
            for(let i=0; i<4; i++){
                quiz__category[i].classList.add("disabled");
            }
        }
        function diffLevel(option, diffSelected){
            option.classList.add('selected');
            QuizdiffLevel = diffSelected;
            console.log(QuizdiffLevel);
              //Disabling option to change
              for(let i=0; i<3; i++){
                diff__level[i].classList.add("disabled");
            }
            startQuiz.classList.remove("hide");
            
        }


//Making HTTP Request to Get Question
let QUIZ_Question;
function loadQuestion(Quizcategory,QuizdiffLevel)
{
    url = 'https://opentdb.com/api.php?amount=10&category='+Quizcategory+'&difficulty='+QuizdiffLevel+'&type=multiple';
    console.log(url);
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", url, false ); // false for synchronous request
    xmlHttp.send( null );
    // QUIZ_Question = xmlHttp.responseText;
    // QUIZ_Question = JSON.stringify(QUIZ_Question);

    QUIZ_Question = JSON.parse(xmlHttp.responseText);
}


//Showing Question
let currentQuestion;        //Defining Curent Question


// //Method to show question
function showQuestion(index){

    //Hining next Button
    nextButton.classList.remove("activeNow");


    //Update Counter 
    updateQuestionCounter(index);
    currentQuestion = QUIZ_Question.results[index];
    question.innerHTML = currentQuestion.question;
    
    randPos = Math.floor(Math.random() * 4)
    console.log(randPos)
    j=0;
    for(let i=0; i<4; i++){
        if(randPos == i){
            option[i].innerHTML =  currentQuestion.correct_answer;
        }else{
            option[i].innerHTML =  currentQuestion.incorrect_answers[j++];
        }
    }
    
    // console.log(QUIZ_Question);
    console.log(currentQuestion);
   
}

//If Option Selected, Check the Option if correct
function checkOption(optionSelected){

    // Stop the timer
    clearInterval(counter); //clear counter

     //Disabling option to change
     for(let i=0; i<4; i++){
        option[i].classList.add("disabled");
    }

    optionSelected.classList.add('selected');
    
    let userOption = optionSelected.innerHTML;
    console.log(userOption);
    if(userOption == currentQuestion.correct_answer){
        score++;
    }

    nextButton.classList.remove("hide");

}

// Updating Question Counter
function updateQuestionCounter(index){
    questionCounter = document.querySelector("#attampted__q");
    questionCounter.innerHTML = index+1;
}

/************** TIMER ******************** */
let timeValue =  15;
let counter;

function startTimer(time){
    counter = setInterval(timer, 1000);
    function timer(){
        time__left.textContent = time; //changing the value of timeCount with time value
        time--; //decrement the time value
        if(time < 9){ //if timer is less than 9
            let addZero = time__left.textContent; 
            time__left.textContent = "0" + addZero; //add a 0 before time value
        }
        if(time < 0){ //if timer is less than 0
            clearInterval(counter); //clear counter
          
             //Disabling option to change
                for(let i=0; i<4; i++){
                    option[i].classList.add("disabled");
                }

           
                nextButton.classList.remove("hide"); //show the next button
        }
    }
}