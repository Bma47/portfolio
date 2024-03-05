let sudokus = [
  [[2,5,0,7,0,0,0,1,6], [0,6,0,0,0,0,4,2,8], [0,0,0,1,0,0,5,0,0], [5,7,0,2,1,8,9,0,0], [0,0,0,3,0,9,7,8,0], [9,0,3,0,0,5,1,0,0], [0,0,0,8,3,0,0,7,0], [4,0,2,0,0,7,0,0,0], [0,0,7,0,5,0,0,3,0]],
  [[0,0,9,0,0,0,0,0,8], [6,0,7,4,1,0,0,5,0], [0,0,2,0,5,0,0,0,7], [0,9,0,1,0,7,6,0,0], [0,4,0,0,9,6,3,0,0], [8,6,3,0,0,4,7,0,9], [5,3,6,0,0,0,0,7,0], [0,0,0,7,8,0,0,3,0], [0,7,0,0,0,0,0,9,2]],
  [[0,0,0,0,5,0,1,0,0], [7,0,0,1,0,0,6,0,0], [2,3,1,0,8,0,0,0,0], [3,1,0,0,0,6,8,0,0], [0,0,7,0,0,0,0,9,5], [0,4,0,0,3,7,0,0,0], [0,2,5,3,0,0,0,8,7], [0,0,6,9,0,0,0,3,2], [4,0,3,2,0,0,0,1,0]],
  [[6,0,0,5,1,8,0,0,0], [4,2,1,0,0,0,0,0,0], [0,8,0,0,3,0,6,9,1], [0,0,0,1,0,2,7,5,8], [5,1,6,0,0,0,2,0,0], [0,0,0,9,5,3,0,6,0], [0,0,0,0,0,0,0,1,7], [3,9,8,7,0,1,0,0,6], [0,5,0,8,4,6,0,2,0]],
  [[4,0,3,0,5,2,6,0,0], [0,0,2,0,8,6,3,0,0], [0,0,0,0,1,3,4,2,7], [1,6,0,0,0,4,0,9,0], [0,3,0,0,0,5,0,4,0], [0,7,0,0,9,0,5,0,0], [9,0,0,0,0,0,0,0,6], [3,0,0,8,2,7,0,0,1], [5,8,0,3,0,0,0,0,0]],
  [[0,0,2,0,0,0,4,3,8], [4,3,9,0,0,5,0,0,2], [8,0,0,2,0,3,0,0,5], [6,0,0,9,5,0,0,0,0], [5,9,4,0,0,0,8,2,0], [7,0,0,0,6,4,0,9,0], [0,0,0,0,0,8,1,6,0], [0,4,0,0,0,0,0,0,0], [2,8,0,4,0,9,3,0,0]],
  [[4,0,3,0,5,2,6,0,0], [0,0,2,0,8,6,3,0,0], [0,0,0,0,1,3,4,2,7], [1,6,0,0,0,4,0,9,0], [0,3,0,0,0,5,0,4,0], [0,7,0,0,9,0,5,0,0], [9,0,0,0,0,0,0,0,6], [3,0,0,8,2,7,0,0,1], [5,8,0,3,0,0,0,0,0]],
  [[0,0,2,0,0,0,4,3,8], [4,3,9,0,0,5,0,0,2], [8,0,0,2,0,3,0,0,5], [6,0,0,9,5,0,0,0,0], [5,9,4,0,0,0,8,2,0], [7,0,0,0,6,4,0,9,0], [0,0,0,0,0,8,1,6,0], [0,4,0,0,0,0,0,0,0], [2,8,0,4,0,9,3,0,0]],
  [[0,0,0,7,3,0,0,0,9], [2,8,9,0,0,0,7,0,0], [7,0,0,0,8,0,2,6,0], [8,0,0,0,0,5,6,0,4], [6,3,0,0,0,0,0,0,0], [0,0,0,8,0,9,0,0,5], [0,0,8,0,5,0,3,2,6], [5,0,0,2,4,0,9,0,0], [3,1,0,6,0,0,0,0,7]]
]


function PlaatsCijfer(cijfer) {
  let actiefInput = document.activeElement.id;

  if (actiefInput.startsWith("inp_")) {

    document.getElementById(actiefInput).value = cijfer;
  }
}

function generateSudoku()
{
    // alert("Function triggered")
    let randomnumber = nmbr_gen(6)
    let selectedsudoku = sudokus[randomnumber]
    let rijteller = 1
    let index2teller = 0
    while(rijteller < 10) 
    {
        let kolomteller = 1 
        let indexteller = 0
        while(kolomteller <= 9)
        {
            if(selectedsudoku[index2teller][indexteller] == 0){
                document.getElementById("inp_" + rijteller +  "_" + kolomteller).value = "";
                document.getElementById("inp_" + rijteller +  "_" + kolomteller).disabled = false;
            }
            else{
                document.getElementById("inp_" + rijteller +  "_" + kolomteller).value = selectedsudoku[index2teller][indexteller]
                document.getElementById("inp_" + rijteller +  "_" + kolomteller).disabled = true
            }

            kolomteller++
            indexteller++
        }
        rijteller++
        index2teller++
    }
}
    


  

function nmbr_gen(max)
{
  let randomnumber = Math.floor(Math.random() * (max + 1))
  document.getElementById("sudoku").innerText = randomnumber
  return randomnumber
}
function nmbr_generator(min, max)
{
  let verschil = max - min
  let randomnumber = min + Math.floor(Math.random() * (verschil + 1))
  document.getElementById("dobbelsteen").innerText = randomnumber
}

//canva bord
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
let isDrawing = false;

canvas.addEventListener('mousedown', startDrawing);
canvas.addEventListener('mousemove', draw);
canvas.addEventListener('mouseup', stopDrawing);

function startDrawing(e) {
  isDrawing = true;
  draw(e);
}

function draw(e) {
  if (!isDrawing) rebeurt;
  ctx.lineWidth = 2;
  ctx.lineCap = 'round';
  
  ctx.strokeStyle = '#4169e1';
  ctx.lineTo(e.offsetX, e.offsetY);
  ctx.stroke();
  ctx.beginPath();
  ctx.moveTo(e.offsetX, e.offsetY);
}

function stopDrawing() {
  isDrawing = false;
  ctx.beginPath();
}


















// const inputs = document.querySelectorAll(" #inp_1_1, #inp_1_2, #inp_1_3, #inp_1_4, #inp_1_5, #inp_1_6, #inp_1_7, #inp_1_8, #inp_1_9, #inp_2_1, #inp_2_2, #inp_2_3, #inp_2_4, #inp_2_5, #inp_2_6, #inp_2_7, #inp_2_8, #inp_2_9, #inp_3_1, #inp_3_2, #inp_3_3, #inp_3_4, #inp_3_5, #inp_3_6, #inp_3_7, #inp_3_8, #inp_3_9, #inp_4_1, #inp_4_2, #inp_4_3, #inp_4_4, #inp_4_5, #inp_4_6, #inp_4_7, #inp_4_8, #inp_4_9, #inp_5_1, #inp_5_2, #inp_5_3, #inp_5_4, #inp_5_5, #inp_5_6, #inp_5_7, #inp_5_8, #inp_5_9, #inp_6_1, #inp_6_2, #inp_6_3, #inp_6_4, #inp_6_5, #inp_6_6, #inp_6_7, #inp_6_8, #inp_6_9, #inp_7_1, #inp_7_2, #inp_7_3, #inp_7_4, #inp_7_5, #inp_7_6, #inp_7_7, #inp_7_8, #inp_7_9, #inp_8_1, #inp_8_2, #inp_8_3, #inp_8_4, #inp_8_5, #inp_8_6, #inp_8_7, #inp_8_8, #inp_8_9, #inp_9_1, #inp_9_2, #inp_9_3, #inp_9_4, #inp_9_5, #inp_9_6, #inp_9_7, #inp_9_8, #inp_9_9");

// inputs.forEach(input => {
//   input.addEventListener("input", function() {
//     if (this.value.length >= 1) {
//       let nextInput = getNextInput(this);
//       if (nextInput !== null) {
//         nextInput.focus();
//       }
//     }
//   });
// });


// function getNextInput(currentInput) {
//   let currentId = currentInput.getAttribute("id");
//   let currentRow = currentId.charAt(4);
//   let currentColumn = currentId.charAt(6);
//   if (currentColumn === "9") {
//     if (currentRow === "9") {
//       return null;
//     } else {
//       return document.querySelector("#inp_" + (parseInt(currentRow) + 1) + "_1");
//     }
//   } else {
//     return document.querySelector("#inp_" + currentRow + "_" + (parseInt(currentColumn) + 1));
//   }
// }
