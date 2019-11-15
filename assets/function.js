// es5

function scmakerSelection()
{
  var selector = document.getElementById('selecttype');
  var value = selector[selector.selectedIndex].value;
  //console.log(value);


//  allToHidden('exp');
switch(value){
  case 'text':
  changeViewing('text','exp')
  break;
  case 'image':
  changeViewing('image','exp')
  break;
  case 'link':
  changeViewing('link','exp')
  break;
  default:
  allToHidden('exp');
}
//changeViewing()

}

function allToHidden(eleclass)
{
  var classes = document.getElementsByClassName(eleclass);
  var len = classes.length;
  for (var i = 0; i < len; i++)
  {
    classes[i].style.display = "hidden";
    console.log(i);
  }

}

// broken go fix, suppose to get value of the paragraph and display it
function changeViewing(type,eleclass)
{
  var classes = document.getElementsByClassName(eleclass);
  var len = classes.length;
  // get value
  console.log(classes[0].value);

  for (var i = 0; i < len; i++)
  {
          console.log(classes[i].value);

    if (classes[i].value == type)
    {
      classes[i].style.display = "block";
      console.log(classes[i].value);
    }

  }

}

allToHidden('exp');
changeViewing('text','exp')
