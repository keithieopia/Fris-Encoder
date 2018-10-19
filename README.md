# fris-decoder
Decodes files created by [Fris-Encoder](https://github.com/OGFris/Fris-Encoder) 
without actually running them (using `eval()`). 

Useful for safely decoding untrusted PHP scripts. The original encoder 
by OGFriz is completely safe. However, a malicious actor might create a 
look-alike encoded file that does something nasty. `eval()` is bad, Mmkay?

## Running
    git clone https://github.com/keithieopia/fris-decoder
    cd fris-decoder
    ./fris-decoder original/Fris-Encoder.php

---

Support the original author who does great work: [Fris](https://github.com/OGFris). 
