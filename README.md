# Simple Masonry

> Masonry is the building of structures from individual units laid in and bound together by mortar; the term masonry can also refer to the units themselves.
[Masonry - Wikipedia](http://en.wikipedia.org/wiki/Masonry)

But this repository contain a simple Masonry, build with html-markup and css, not more and was build in few hours to display images, easy and without obstacles.

## Responsive Images
> With srcset, the browser does the work of figuring out which image is best

The theme add all available image sizes for each post and his upload. All images on the home page is generated with the `srcset` attribute.

See the [specification](http://www.whatwg.org/specs/web-apps/current-work/multipage/embedded-content-1.html#processing-the-image-candidates) for the reference algorithm.

#### Example Source
`<img src="small.jpg" srcset="medium.jpg 1000w, large.jpg 2000w" alt="yah">`

#### Wrong browser
The theme include the [picturefill](http://scottjehl.github.io/picturefill/) polyfill as fallback.

#### Hints
Much more readable information can you fond in [the post](https://css-tricks.com/responsive-images-youre-just-changing-resolutions-use-srcset/) from Chris Coyier.

## Demo
See on my personal blog - [bueltge.de [by:ltge.de] | Photographie](http://bueltge.de/photos/)

## Other Notes
### Licence
Good news, this theme is free for everyone! Since it's released under the GPLv2+, you can use it free of charge on your personal or commercial blog.

### Disclaimer
I'm German and my English might be gruesome here and there. So please be patient with me and let me know of typos or grammatical farts. Thanks
