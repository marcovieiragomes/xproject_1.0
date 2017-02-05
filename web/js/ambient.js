console.log("AMBIENT LOADED");
var eventsRead="";
var mouseevs=[];
var keybevs=[];
function getAmbient()
{
  return JSON.stringify({m:mouseevs,k:keybevs});
}

function handlerMouseMove(e)
{
  mouseevs.push("m"+e.pageX+"|"+e.pageY+"|"+(new Date).getTime());
}

function handlerMouseDown(e)
{
  mouseevs.push("d"+e.pageX+"|"+e.pageY+"|"+(new Date).getTime());
}

function handlerMouseUp(e)
{
  mouseevs.push("u"+e.pageX+"|"+e.pageY+"|"+(new Date).getTime());
}

function handlerKeyUp(e)
{
  keybevs.push("u"+e.keyCode+"|"+(e.ctrlKey?"c":"-")+(e.altKey?"a":"-")+(e.shiftKey?"s":"-")+(e.metaKey?"m":"-")+"|"+(new Date).getTime());
}

function handlerKeyDown(e)
{
  keybevs.push("d"+e.keyCode+"|"+(e.ctrlKey?"c":"-")+(e.altKey?"a":"-")+(e.shiftKey?"s":"-")+(e.metaKey?"m":"-")+"|"+(new Date).getTime());
}

function start()
{
  $(function(){
    $(document).mousemove(handlerMouseMove);
    $(document).mousedown(handlerMouseDown);
    $(document).mouseup(handlerMouseUp);
    $(document).keyup(handlerKeyUp);
    $(document).keydown(handlerKeyDown);
  });
}
function checkJQ()
{
    if (typeof($)!="undefined")
      start();
    else
      setTimeout(checkJQ,100);
}
checkJQ();
