import * as THREE from "three";
import { GLTFLoader } from "three/addons/loaders/GLTFLoader.js";

const loader = new GLTFLoader();

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(
    75,
    window.innerWidth / window.innerHeight,
    0.1,
    1000
);
camera.position.z = 20;

let bright = new THREE.DirectionalLight(0xffffff, 0.9);
bright.position.z = 5;

const light = new THREE.AmbientLight(0x808080);
scene.add(light);

const directionalLight = new THREE.DirectionalLight(0xffffff, 0.5);
scene.add(directionalLight);
directionalLight.position.z = 10;

const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

let ball;

loader.load(
    "./pokemon_basic_pokeball/scene.gltf",
    function (gltf) {
        ball = gltf.scene;
        scene.add(ball);

        function animate() {
            requestAnimationFrame(animate);

            ball.rotation.x += 0.01;
            ball.rotation.y += 0.01;

            renderer.render(scene, camera);
        }

        animate();
    },
    undefined,
    function (error) {
        console.error(error);
    }
);

document.body.onkeydown = function (e) {
    if (e.key == " " || e.code == "Space" || e.keyCode == 32) {
        scene.add(bright);
    }
};

document.body.onkeyup = function (e) {
    if (e.key == " " || e.code == "Space" || e.keyCode == 32) {
        scene.remove(bright);
    }
};
