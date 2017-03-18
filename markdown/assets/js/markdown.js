/*@url : https://css-tricks.com/automatic-table-of-contents/ */

var ToC =
	"<nav role='navigation' class='table-of-contents hidden-xs hidden-sm'>" +
	"<h2>Sur cette page:</h2>" +
	"<ul>";

var newLine, el, title, link;

$("article h2").each(function() {

	el = $(this);
	title = el.text();
	link = "#" + el.attr("id");

	newLine =
		"<li>" +
		"<a href='" + link + "'>" +
		title +
		"</a>" +
		"</li>";

	ToC += newLine;

});

ToC +=
	"</ul>" +
	"</nav>";

$("article").prepend(ToC);
