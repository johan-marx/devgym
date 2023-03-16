const state = document.getElementById("state");
const colorPart = document.querySelectorAll(".color-part");
const container = document.querySelector(".container");
const startButton = document.querySelector("#start");
const result = document.querySelector("#result");
const wrapper = document.querySelector(".wrapper");

const colors = {
  green: {
    inactive: "#068e06",
    active: "#11e711",
    tone: "E3",
  },
  red: {
    inactive: "#950303",
    active: "#fd2a2a",
    tone: "A4",
  },
  blue: {
    inactive: "#01018a",
    active: "#2062fc",
    tone: "E4",
  },
  yellow: {
    inactive: "#919102",
    active: "#fafa18",
    tone: "C#4",
  },
};

let sequence = [];
let busy = false;
let count = 0;

startButton.addEventListener("click", async () => {
  await Tone.start();
  synth = new Tone.Synth().toDestination();
  sequence = [];
  count = 0;
  setBusy(false);
  wrapper.classList.remove("hide");
  container.classList.add("hide");
  generateSequence();
});

const generateSequence = () => {
  sequence.push(generateColour());
  setBusy(true);
  playSequence();
};

const generateColour = () => {
  // 1. Generate a random color from colors.
  return Object.keys(colors)[Math.floor(Math.random() * 4)];
};

const playSequence = async () => {
  for (let color of sequence) {
    await delay(400);
    await blinkEffect(color);
    await delay(400);
  }
  setBusy(false);
};

async function delay(time) {
  return await new Promise((resolve) => {
    setTimeout(resolve, time);
  });
}

colorPart.forEach((element) => {
  element.addEventListener("click", async (e) => {
    // 2. Check if the user has clicked the correct color then blink the color and
    //    add a new color to the sequence. Else, call the lose function.
    if (busy) {
      return;
    }

    if (e.target.classList[0] !== sequence[count]) {
      lose();
      return;
    }

    await blinkEffect(e.target.classList[0]);
    count++;

    if (count === sequence.length) {
      count = 0;
      generateSequence();
      return;
    }
  });
});

setBusy = (value) => {
  busy = value;
  if (busy) {
    state.innerHTML = "WAIT";
    document.body.classList.add("waiting");
  } else {
    state.innerHTML = "PLAY";
    document.body.classList.remove("waiting");
  }
};

blinkEffect = async (color) => {
  // 3. Add a tone to the blink effect. Each color should have a different tone.
  synth.triggerAttackRelease(`${colors[color]["tone"]}`, 0.5);
  let currentColor = document.querySelector(`.${color}`);
  currentColor.style.backgroundColor = `${colors[color]["active"]}`;
  await delay(500);
  currentColor.style.backgroundColor = `${colors[color]["inactive"]}`;
};

const lose = () => {
  // 4. Add a "defeat" tone when you lose.
  synth.triggerAttackRelease("C2", 1);
  result.innerHTML = `<span> Your Score: </span> ${sequence.length}`;
  result.classList.remove("hide");
  container.classList.remove("hide");
  wrapper.classList.add("hide");
  startButton.innerText = "Play Again";
  startButton.classList.remove("hide");
};
