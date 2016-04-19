<?php

# Vectors are much like arrays. Operations on a vector offer the same big O as their counterparts on an array.
# Unlike arrays, which are always of a fixed size, vectors can be grown
# This can be done either explicitly or by adding more data. In order to do this efficiently, the typical vector implementation 
# grows by doubling its allocated space (rather than incrementing it) and often has more space allocated to it at any one time 
# than it needs. This is because reallocating memory can sometimes be an expensive operation.