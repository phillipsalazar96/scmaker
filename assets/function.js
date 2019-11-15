// es5
const addformclass = "add_shortcode_boxes";
function scmakerSelection()
{
  var selector = document.getElementById('selecttype');

  var value = selector[selector.selectedIndex].value;

  // the onchange event
  allToHidden(addformclass);
  switch(value)
  {
      case 'text':
      changeViewing('text',addformclass)
      break;

      case 'image':
      changeViewing('image',addformclass)
      break;

      case 'link':
      changeViewing('link',addformclass)
      break;

      case 'video':
      changeViewing('video',addformclass)
      break;

      case 'audio':
      changeViewing('audio',addformclass)
      break;

      default:
      allToHidden(addformclass);
    }


}

function allToHidden(eleclass)
{
  var classes = document.getElementsByClassName(eleclass);
  var len = classes.length;
  for (var i = 0; i < len; i++)
  {
    classes[i].style.display = "none";

  }

}


function changeViewing(type,eleclass)
{
  var classes = document.getElementsByClassName(eleclass);
  var len = classes.length;
  allToHidden(addformclass);
  for (var i = 0; i < len; i++)
  {
    if (classes[i].getAttribute("name") == type)
    {
      classes[i].style.display = "block";
      break;
    }

  }

}

allToHidden(addformclass);
