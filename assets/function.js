// es5

function scmakerSelection()
{
  var selector = document.getElementById('selecttype');

  var value = selector[selector.selectedIndex].value;

  // the onchange event
  allToHidden('exp');
  switch(value)
  {
      case 'text':
      changeViewing('text','exp')
      break;

      case 'image':
      changeViewing('image','exp')
      break;

      case 'link':
      changeViewing('link','exp')
      break;

      case 'label':
      changeViewing('label','exp')
      break;

      case 'button':
      changeViewing('button','exp')
      break;

      case 'bar':
      changeViewing('bar','exp')
      break;

      case 'video':
      changeViewing('video','exp')
      break;

      case 'audio':
      changeViewing('audio','exp')
      break;

      default:
      allToHidden('exp');
    }


}

function allToHidden(eleclass)
{
  var classes = document.getElementsByClassName(eleclass);
  var len = classes.length;
  for (var i = 0; i < len; i++)
  {
    classes[i].style.display = "none";
    break;
  }

}


function changeViewing(type,eleclass)
{
  var classes = document.getElementsByClassName(eleclass);
  var len = classes.length;

  for (var i = 0; i < len; i++)
  {
    if (classes[i].getAttribute("name") == type)
    {
      classes[i].style.display = "block";
      break;
    }

  }

}

allToHidden('exp');
