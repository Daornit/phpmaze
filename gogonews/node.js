const all = document;
let data = all.childNodes;
let html = {
  head: document.createElement("head"),
  body: document.createElement("body")
}
const load = () => {
  html.head.innerHTML = all.firstElementChild.firstElementChild.innerHTML;
  all.firstElementChild.firstElementChild.innerHTML = "<style>div{margin-left:10px}</style>";
  html.body.innerHTML = all.firstElementChild.firstElementChild.nextElementSibling.innerHTML;
  all.firstElementChild.firstElementChild.nextElementSibling.innerHTML = "";
  body = document.firstElementChild.firstElementChild.nextElementSibling;
  body.innerHTML = `<div id="head"><p onClick="heads()">HEAD</p></div><div id="body"><p onClick="bodys()">BODY</p></body>`;
}
function heads(a){
  console.log(a);
  clearHead(html.head);
  let i=0;
  let k = '';
  while(i<html.head.childNodes.length){
    let attr = html.head.childNodes[i].getAttributeNames();
    let div = `<div data-id="${i}">${html.head.childNodes[i].nodeName}[`;
    for(let j=0;j<attr.length;j++){
      div = div+attr[j]+"="+html.head.childNodes[i].getAttribute(attr[j])+';  ';
    }
    div=div+"]</div></br>";
    k=k+div;
    i++;
  }
  document.querySelector("#head").innerHTML = document.querySelector("#head").innerHTML + k;
  console.log(html.head);
}
function clearHead(head){
  let i=0;
  while(i<head.childNodes.length){
    if(head.childNodes[i].data){
      head.childNodes[i].remove();
      i=0;
    }
    i++;
  }
}
function bodys(){
  document.querySelector("#body").appendChild(elementShow(html.body));
}

function elementShow(tag){
  let tmp = document.createElement("div");
  tmp.innerHTML = `<span onClick="show(this)">+</span>`;
  let paragraph = document.createElement("p");
  paragraph.innerHTML=tag.nodeName;

  if(paragraph.innerHTML == "#text" || paragraph.innerHTML=="#comment"){
    tmp.appendChild(paragraph).style.display = "none";
    return tmp;
  }

  if(tag.hasAttributes()){
    let text = document.createElement("span");
    text.innerHTML = "[";
    let attr = tag.getAttributeNames();
    for(let i=0;i<attr.length;i++){
      text.innerHTML = text.innerHTML + attr[i] + "=" + tag.getAttribute(attr[i]) + "; ";
    }
    text.innerHTML = text.innerHTML+"]";
    paragraph.appendChild(text);
  }else{
    let text = document.createElement("span");
    text.innerHTML = "[]";
    paragraph.appendChild(text);
  }
  tmp.appendChild(paragraph).style.display = "none";

  if(tag.hasChildNodes()){
    for(let j=0;j<tag.childNodes.length;j++){
      tmp.appendChild(elementShow(tag.childNodes[j])).style.display = "none";
    }
  }
  return tmp;
}
function show(tag){
  for(let i=0;i<tag.parentNode.childNodes.length;i++){
    tag.parentNode.childNodes[i].style.display = "block";
  }
  tag.innerHTML="-";
  tag.setAttribute("onClick","hide(this)");
}
function hide(tag){
  for(let i=0;i<tag.parentNode.childNodes.length;i++){
    tag.parentNode.childNodes[i].style.display = "none";
  }
  tag.innerHTML="+";
  tag.setAttribute("onClick","show(this)");
  tag.style.display = "inline";
}
window.onload = load;
