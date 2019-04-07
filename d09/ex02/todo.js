let ft_list;

const onload = () => {
  ft_list = document.getElementById("ft_list");

  const newBtn = document.getElementById("button_new");
  newBtn.addEventListener("click", () => {
    const txt = prompt("Add things to do.", "Nothing special!");
    if (txt) addEntry(txt);
  });
  const todoItems = localStorage.getItem('todo');
  if (todoItems) {
    try {
      const parsedItems = JSON.parse(todoItems);
      parsedItems.forEach(addEntry);
    } catch (e) {
      console.log('There was an error. Calm down.');
      console.log(todoItems);
      console.log(e);
    }
  }
}

const onunload = () => {
  console.log("unload");
  const todoItems = [...ft_list.children]
    .filter(div => div.tagName === "DIV")
    .map(div => div.innerHTML)
    .reverse();
  localStorage.setItem('todo', JSON.stringify(todoItems));
}

const addEntry = (txt) => {
  var div = document.createElement("div");
  div.className = "entry";
  div.innerHTML = txt;
  div.addEventListener("click", deleteEntry);
  ft_list.insertBefore(div, ft_list.firstChild);
}

const deleteEntry = (event) =>{
  const { target } = event;
  if(confirm("Delete this entry?"))
    target.parentElement.removeChild(target);
}

window.onload = onload;
window.onunload = onunload;
