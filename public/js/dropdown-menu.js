function toggleMenu (dropdown) {
    const el = dropdown.parentElement.querySelector('.subMenu')
    el.classList.toggle('hidden')
  }
  const dropdown = document.querySelector('.hasSubMenu')
  dropdown.addEventListener('click', function(){
    toggleMenu(dropdown)
  })
