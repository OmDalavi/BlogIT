writers=document.getElementsByClassName("writer-name");
i=0;
a=document.getElementById("hiddenform");
while(i<writers.length){
	writers[i].addEventListener("click",function(event){

		a.children[0].value=event.target.innerText;
		a.submit();
	});
	i++;
}

