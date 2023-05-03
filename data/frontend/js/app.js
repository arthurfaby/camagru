/* Post template 

<div class="post" id="2" >
  <h1 class="post__title">author</h1>
  <div class="post__content">
    <img src="image_url" />
    <div class="buttons-span">
      <span class="material-symbols-outlined" id="post_like_2"> thumb_up </span>
      <span class="material-symbols-outlined" id="post_comment_2"> comment </span>
    </div>
  </div>
</div>;

*/
const createPost = (author, img_url, likes, id) => {
  /* Create all 7 elements to make a post */

  let div_post = document.createElement("div");
  let h1_post = document.createElement("h1");
  let h1_post_text = document.createTextNode(author);
  let div_post__content = document.createElement("div");
  let img = document.createElement("img");
  let div_buttons_span = document.createElement("div");
  let span_thump_up = document.createElement("span");
  let span_thump_up_text = document.createTextNode(" thumb_up ");
  let span_comment = document.createElement("span");
  let span_comment_text = document.createTextNode(" comment ");

  /* Add all properties to the 7 elements */
  div_post.classList.add("post");
  div_post.id = "post_" + id;
  h1_post.classList.add("post__title");
  h1_post.appendChild(h1_post_text);
  div_post__content.classList.add("post__content");
  img.src = img_url;
  div_buttons_span.classList.add("buttons-span");
  span_thump_up.classList.add("material-symbols-outlined"); // Google icons class
  span_thump_up.appendChild(span_thump_up_text);
  span_thump_up.id = "post_like_" + id;
  span_comment.classList.add("material-symbols-outlined"); // Google icons class
  span_comment.appendChild(span_comment_text);
  span_comment.id = "post_comment_" + id;

  /* Insert all elements into others to create the complete html structure */
  div_buttons_span.appendChild(span_thump_up);
  div_buttons_span.appendChild(span_comment);
  div_post__content.appendChild(img);
  div_post__content.appendChild(div_buttons_span);
  div_post.appendChild(h1_post);
  div_post.appendChild(div_post__content);

  // Add elements to the list of posts
  document.getElementsByClassName("posts")[0].appendChild(div_post);
};

createPost(
  "afaby",
  "https://www.searchenginejournal.com/wp-content/uploads/2022/06/image-search-1600-x-840-px-62c6dc4ff1eee-sej.png",
  0,
  1
);

createPost(
  "blevrel",
  "https://cdn.futura-sciences.com/sources/images/dossier/773/01-intro-773.jpg",
  0,
  2
);

createPost(
  "kbrousse",
  "https://www.referenseo.com/wp-content/uploads/2019/03/image-attractive.jpg",
  0,
  3
);

createPost(
  "pirabaud",
  "https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg",
  0,
  4
);

createPost(
  "jsauvain",
  "https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8&w=1000&q=80",
  0,
  5
);

for (let i = 1; i <= 5; ++i) {
    document.getElementById("post_like_" + i).addEventListener("click", (e) => {
        console.log(document.getElementById("post_" + i).childNodes[0].innerText)
    })
}
