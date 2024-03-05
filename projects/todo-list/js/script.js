async function get() {

  try {
    
    const response = await fetch("https://goweather.herokuapp.com/weather/Groninegn");
    const data = await response.json();
    console.log(data); 
  
  document.querySelector("#content h1").innerHTML = "<h1>" + data.topic + "</h1>";
  document.querySelector("#content h1").innerHTML = "<h1>" + data.users + "</h1>";

  // document.querySelector("#content h1").innerHTML = "<h3>" + data.topic + "</h3>";

  
} catch (error) {
    console.error("An error occurred:", error);
  }
}

get();








































// async function get() {
//   try {
//     const response = await fetch("http://localhost/todo-list/api/api.php");
//     const data = await response.json();

//     // Access the "todos" array
//     const todosArray = data.todos;

//     // Now you can access individual items in the "todos" array
//     todosArray.forEach(todo => {
//       // Access properties of each todo item
//       console.log("Task: " + todo.task);
//       console.log("From Date: " + todo.from_dt);
//       console.log("To Date: " + todo.to_dt);
//       // ... and so on
//     });
//   } catch (error) {
//     console.error("An error occurred:", error);
//   }
// }

// get();
