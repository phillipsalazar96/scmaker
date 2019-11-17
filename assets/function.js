// es5
const addformclass = "add_shortcode_boxes";

allToHidden(addformclass);
viewShortCode()

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

      default:
      allToHidden(addformclass);
    }

    document.getElementById("display-area").innerHTML = "";
    clearValue()
}

function viewShortCode()
{
  var selector = document.getElementById('selecttype');

  var value = selector[selector.selectedIndex].value;

  var listofid = ["text-box-form", "image-box-form", "link-box-form", "video-box-form", "audio-box-form"];
  var cat = []
  for (var i = 0; i < listofid.length; i++)
  {
    var idname = listofid[i].split("-");
    cat.push(idname[0]);
  }

  for (var i = 0; i < cat.length; i++)
  {
    if (cat[i] === value)
    {
      var k = searchForValue(listofid[i]);
      var lenwid = propImageSize("image");
      console.log(k)
      console.log(lenwid)
      appendToHTML(value, k, lenwid)
    }
  }


}

function searchForValue(id)
{
  var arr = [];

  var elemform = document.getElementById(id).childNodes;
  var childofelem = elemform[1].childNodes;

  for (var i = 0; i < childofelem.length; i++)
  {
    if (childofelem[i].value)
    {
      arr.push(childofelem[i].value);
    }
  }
  return arr;

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

function appendToHTML(type, attr, misc)
{
  var displayarea = document.getElementById("display-area");


  if (type == "text" )
  {
    displayarea.innerHTML = "<p>[" + attr[0] + "]</p><p>" + attr[1] + "</p>";
  }
  else if (type == "image" )
  {

    displayarea.innerHTML = "<p>[" + attr[0] + "]</p><img src='" + attr[1] + "' alt='" + attr[2] + "' height='" + misc[0] + "' width='" + misc[1] + "'" + "/>";
  }
  else if ( type == "link" )
  {
    displayarea.innerHTML = "<p>" + attr[0] + "</p><a href='" + attr[2] + "'>" + attr[1] + "</a>";
  }
  else if ( type == "video" )
  {
    //add video
    var url = cutYoutubeUrl(attr[1])
    displayarea.innerHTML = '<iframe width="1088" height="612" src="' + url + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'

  }
  else
  {
      displayarea.innerHTML = "";
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

function propImageSize(id)
{
  var arr;
  if (document.getElementById(id + "sizemedium").checked)
  {
    arr = [400,400];
  }
  else if (document.getElementById(id + "sizelarge").checked)
  {
      arr = [600,600];
  }
  else
  {
      arr = [200,200];
  }
  return arr;
}

function cutYoutubeUrl(url)
{
  var str = "https://youtube.com/embed/" + url.substring(17);
  return str;
}
// Go over it, I do not know how it works!
function clearValue()
{
  var listofid = ["text-box-form", "image-box-form", "link-box-form", "video-box-form", "audio-box-form"];
  for (var k = 0; k < listofid.length; k++)
  {
      var elemform = document.getElementById(listofid[k]).childNodes;
      var childofelem = elemform[1].childNodes;
      for (var i = 0; i < childofelem.length; i++)
      {
        var typed = childofelem[i].type
        if (typed == "text")
        {
          childofelem[i].value = "";
        }
      }
  }
}
