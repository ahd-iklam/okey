
let show_sidebar = document.querySelector('.open-widget'); 
show_sidebar.addEventListener("click", function(){
	let sidebar_area = document.querySelector('.right_sidebar');
	sidebar_area.classList.toggle("appear");
	if(show_sidebar.className === 'fas fa-times-circle close-widget')
	{
        show_sidebar.setAttribute('class' , 'fas fa-bars open-widget')
			
	}
	else
	{
		show_sidebar.setAttribute('class' , 'fas fa-times-circle close-widget')
	}
});
