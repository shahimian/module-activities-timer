240px	small
663px	medium or desktop

for background body
background-color: #0072b5; // Old browsers
@include filter-gradient(#0072b5, #ffffff, vertical); // IE6-9
@include background-image(linear-gradient(top,  #0072b5 0%,#0072b5 70%,#ffffff 100%));



for main module
background-color: #aee6fb; // Old browsers
@include filter-gradient(#aee6fb, #0ea7d9, vertical); // IE6-9
@include background-image(linear-gradient(top,  #aee6fb 0%,#0ea7d9 100%));
