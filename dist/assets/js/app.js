// WEBGL MARS
var renderer = new THREE.WebGLRenderer({
    antialiasing : true
});

renderer.setSize((window.innerWidth - 130), window.innerHeight)
marsloc.appendChild(renderer.domElement)
renderer.shadowMapEnabled	= true

var scene = new THREE.Scene()
var camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 10000)
camera.position.z = 1
camera.target = new THREE.Vector3(0.2, 0, 0)
camera.position.set(200, 0, 0)

// Set lights
var light = new THREE.AmbientLight( 0x222222 )
scene.add( light )

light	= new THREE.DirectionalLight( 0xffffff, 1 )
light.position.set(5,5,5)
scene.add( light )
light.castShadow	= true
light.shadowCameraNear	= 0.01
light.shadowCameraFar	= 15
light.shadowCameraFov	= 45

light.shadowCameraLeft	= -1
light.shadowCameraRight	=  1
light.shadowCameraTop	=  1
light.shadowCameraBottom= -1

light.shadowBias	    = 0.001
light.shadowDarkness	= 0.2

light.shadowMapWidth	= 1024
light.shadowMapHeight	= 1024

// Init stars
createStarfield = function ()
{
    var texture	= THREE.ImageUtils.loadTexture('assets/img/galaxy_starfield.png');
	var material	= new THREE.MeshPhongMaterial({
		map	: texture,
		side	: THREE.BackSide
	});
	var geometry	= new THREE.SphereGeometry(500, 400, 400)
	var mesh	= new THREE.Mesh(geometry, material)
	return mesh
};

// Add stars
var starSphere = createStarfield()
scene.add(starSphere)


// Init Mars
createMars = function()
{
    var geometry	= new THREE.SphereGeometry(60, 80, 80);
	var material	= new THREE.MeshPhongMaterial({
		map	: THREE.ImageUtils.loadTexture('assets/img/marsmap1k.jpg'),
		bumpMap	: THREE.ImageUtils.loadTexture('assets/img/marsbump1k.jpg'),
		bumpScale: 0.05
	});
	var mesh	= new THREE.Mesh(geometry, material)
	return mesh
};

// Add Mars
var container_mars = new THREE.Object3D();
container_mars.rotateZ(-23.4 * Math.PI/180);
container_mars.position.z	= 0
scene.add(container_mars)

var marsMesh = createMars()
container_mars.add(marsMesh)

// Call the controls library
let controls = new THREE.OrbitControls(camera, renderer.domElement)
controls.addEventListener('change', render)
controls.minDistance = 180;
controls.maxDistance = 350;

let clock = new THREE.Clock()

// Animate both stars and Mars
function render()
{
    var delta = clock.getDelta()
    starSphere.rotation.y += 0.1 * delta;
    renderer.clear()
    renderer.render(scene, camera)
    if (!marsloc.classList.contains('grabbing'))
    {
        marsMesh.rotation.y += 0.1 * delta;
    }
}

function animate()
{
  requestAnimationFrame(animate)
  controls.update();
  render()
};

animate()


// Set grab cursor
marsloc.addEventListener('mousedown', function()
{
  marsloc.style.cursor = "-moz-grabbing";
  marsloc.style.cursor = "-webkit-grabbing";
  marsloc.style.cursor = "grabbing";
  marsloc.className += " grabbing";
});

marsloc.addEventListener('mouseup', function()
{
  marsloc.style.cursor = "-moz-grab";
  marsloc.style.cursor = "-webkit-grab";
  marsloc.style.cursor = "grab";
  marsloc.className -= "grabbing"
});

window.addEventListener( 'resize', onWindowResize, false );

// Responsive
function onWindowResize(){
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth -130, window.innerHeight);
};


// DISABLE ZOOM

function load(){
  marsloc.addEventListener("wheel", zoomShortcut); //add the event
}

function zoomShortcut(e){
  if(e.ctrlKey){            //[ctrl] pressed?
    event.preventDefault();  //prevent zoom
    if(e.deltaY<0){        //scrolling up?
                            //do something..
      return false;
    }
    if(e.deltaY>0){        //scrolling down?
                            //do something..
      return false;
    }
  }
}
load();
