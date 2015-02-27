AnimatedCluster strategy for OpenLayers
=======================================

To support styling of single feature clusters: I have introduced the feature attributes to the cluster when the cluster count is 1.

To fix the problem of missing feature when panning: I have removed the filter that removes features that are not in the viewport (not the best fix if you have a lot of features).

