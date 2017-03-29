var renderer = new THREE.WebGLRenderer({
    antialiasing : true
});

renderer.setSize((window.innerWidth- 350), window.innerHeight)
marsloc.appendChild(renderer.domElement)
renderer.shadowMapEnabled	= true

var scene = new THREE.Scene()
var camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 10000)
camera.position.z = 1
camera.target = new THREE.Vector3(0.2, 0, 0)
camera.position.set(200, 0, 0)

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


createStarfield = function ()
{
    var texture	= THREE.ImageUtils.loadTexture('assets/img/galaxy_starfield.png');
	var material	= new THREE.MeshPhongMaterial({
		map	: texture,
		side	: THREE.BackSide
	});
	var geometry	= new THREE.SphereGeometry(2800, 400, 400)
	var mesh	= new THREE.Mesh(geometry, material)
	return mesh
};

var starSphere = createStarfield()
scene.add(starSphere)

createMars = function()
{
    var geometry	= new THREE.SphereGeometry(60, 40, 40);
	var material	= new THREE.MeshPhongMaterial({
		map	: THREE.ImageUtils.loadTexture('assets/img/marsmap1k.jpg'),
		bumpMap	: THREE.ImageUtils.loadTexture('assets/img/marsbump1k.jpg'),
		bumpScale: 0.05
	});
	var mesh	= new THREE.Mesh(geometry, material)
	return mesh
};

var container_mars = new THREE.Object3D();
container_mars.rotateZ(-23.4 * Math.PI/180);
container_mars.position.z	= 0
scene.add(container_mars)

var marsMesh = createMars()
container_mars.add(marsMesh)

let controls = new THREE.OrbitControls(camera, renderer.domElement)
controls.addEventListener('change', render)

let clock = new THREE.Clock()

function animate(){
  requestAnimationFrame(animate)
  controls.update();
  render()
};

function render(){
   var delta = clock.getDelta()
   marsMesh.rotation.y += 0.1 * delta;
   // starSphere.rotation.y += 0.1 * delta;
   renderer.clear()
   renderer.render(scene, camera)
};

animate();


marsloc.addEventListener('mousedown', function() {
  marsloc.style.cursor = "-moz-grabbing";
  marsloc.style.cursor = "-webkit-grabbing";
  marsloc.style.cursor = "grabbing";
});

marsloc.addEventListener('mouseup', function() {
  marsloc.style.cursor = "-moz-grab";
  marsloc.style.cursor = "-webkit-grab";
  marsloc.style.cursor = "grab";
});

window.addEventListener( 'resize', onWindowResize, false );

function onWindowResize(){
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth - 40, window.innerHeight - 40);
};
