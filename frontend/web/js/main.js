"use strict";

const api_domain = 'http://api.firstbit.loc/'

// let chapters = [
//     {description: "item 1", link: "https://www.youtube.com/watch?v=QYyGzF7unh8", subItems: null},
//     {description: "item 2", link: "https://www.youtube.com/watch?v=QYyGzF7unh8", subItems: null},
//     {description: "item 3", link: "https://www.youtube.com/watch?v=QYyGzF7unh8", subItems:
//         [
//             {description: "sub-item 3.1", link: "https://www.youtube.com/watch?v=QYyGzF7unh8", subItems:
//                     [
//                         {description: "sub-sub-item 3.1.1", link: "https://www.youtube.com/watch?v=QYyGzF7unh8", subItems: null},
//                         {description: "sub-sub-item 3.1.2", link: "https://www.youtube.com/watch?v=QYyGzF7unh8", subItems:
//                                 [
//                                     {description: "sub-sub-item 3.1.1.1", link: "https://www.youtube.com/watch?v=QYyGzF7unh8", subItems: null},
//                                     {description: "sub-sub-item 3.1.1.2", link: "https://www.youtube.com/watch?v=QYyGzF7unh8", subItems: null},
//                                 ]
//                         },
//                     ]
//             },
//             {description: "sub-item 3.2", link: "https://www.youtube.com/watch?v=QYyGzF7unh8", subItems: null},
//         ]
//     },
//     {description: "item 4", link: "https://www.youtube.com/watch?v=QYyGzF7unh8", subItems: null},
// ];
let listContainer = document.createElement("ul");
listContainer.classList.add("list-group");

async function httpGet(url, param = null)
{
    let xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", url + param, false );
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
let chapters = JSON.parse(await httpGet(api_domain, 'chapter'));
let elems = JSON.parse(await httpGet(api_domain, 'elem'));



function nitems(items, listContainer) {
    for (let i = 0; i < items.length; i++) {
        let item = items[i];
        if (item.parent_id != null) {

            // console.log(item.parent_id)
        }

        let li = document.createElement("li");
        let a = document.createElement("a");
        a.innerHTML = item.title;
        a.setAttribute('id', item.id);
        a.classList.add("list-group-item");
        a.classList.add("list-group-item-primary");
        a.classList.add("w-25");
        li.appendChild(a);
        listContainer.appendChild(li);
    }

    return listContainer;
}




function nestItems(items, listContainer) {
    for (let i = 0; i < items.length; i++) {
        let item = items[i];
        let li = document.createElement("li");
        if (item.subItems === null) {
            let a = document.createElement("a");
            a.innerHTML = item.description;
            a.classList.add("list-group-item");
            a.classList.add("w-25");
            li.appendChild(a);
            listContainer.appendChild(li);
        }
        else {
            let div = document.createElement("div");
            div.innerHTML = item.description;
            div.classList.add("list-group-item");
            div.classList.add("w-25");
            li.appendChild(div);
            let ul = document.createElement("ul");
            let subItems = item.subItems;
            ul = nestItems(subItems, ul);
            li.appendChild(ul);
            listContainer.appendChild(li);
        }
    }
    return listContainer;
}

// listContainer = nestItems(chapters, listContainer);
listContainer = nitems(chapters, listContainer);
let navList = document.querySelector("#nav-list");
navList.appendChild(listContainer);

