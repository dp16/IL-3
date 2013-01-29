# Infinite Scroll Settings

Install and activate the infinite scroll plugin and set the following:

Content Selector: #fullhomeposts

Nav. selector: #pagination

Next selector: #pagination a

Item selector: #fullhomeposts article

Callback:

```
if(typeof writeCaptureRefresh == 'function'){
            writeCaptureRefresh();
}
```

Behavior: Manual Trigger