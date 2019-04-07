let ft_list;

const onload = () => {
  ft_list = $("#ft_list");

  $("#button_new").click(() => {
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
  const todoItems = [...ft_list.children()]
    .map(div => $(div))
    .filter(div => div.prop("tagName") === "DIV")
    .map(div => div.html())
    .reverse();
  console.log(todoItems);
  localStorage.setItem('todo', JSON.stringify(todoItems));
}

const addEntry = (txt) => {
  const div = $('<div/>', {
    class: 'entry',
  });
  div.html(txt);
  div.click(deleteEntry);
  ft_list.prepend(div); 
}

const deleteEntry = (event) =>{
  const { target } = event;
  if(confirm("Delete this entry?"))
    $(target).remove();
}

$(document).ready(onload);
$(window).on('unload', onunload);
