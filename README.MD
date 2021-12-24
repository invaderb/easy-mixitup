# EASY-MIXITUP

wp plugin to filter, sort, and animate posts and custom post types.

This plugin will display featured images of posts and custom post types in a grid format where you and filter the items down by categories

## How it works

This plugin offers a simple shortcode with optional arguments

The curly braces can be replaced or removed entirely if you just want to use the default posts

```
[easy-mixitup {post-type=(custom post type name)}]
```

## Example

Display just posts

```
[easy-mixitup]
```

If you have a custom post type named portfolio

```
[easy-mixitup post-type=portfolio]
```

You can also adjust the order of the posts
```
[easy-mixitup order=ASC]
```

```
[easy-mixitup order=DESC]
```

### WP version
Tested on wp version 5.8.2
Should work on 5.8+

### Issues

If you have issues please open a github issue 

### Contributions
This project is open source and free to use for non comercial projects to match mixitup licensing agreements


## TODO

- Add additional arguments
- - order by
- - posts per page
- - define taxamony name
- pagination?
- category arguments