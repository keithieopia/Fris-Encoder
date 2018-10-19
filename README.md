# fris-decoder
Decodes files created by [Fris-Encoder](https://github.com/OGFris/Fris-Encoder) 
without actually running them; e.g.: using `eval()`. 

Useful for safely decoding untrusted PHP scripts. The original encoder 
by OGFriz is completely safe. However, a malicious actor might create a 
look-alike encoded file that does something nasty. Running `eval()` on
untrusted code is bad, Mmkay?

## Running
    git clone https://github.com/keithieopia/fris-decoder
    cd fris-decoder
    ./fris-decoder original/Fris-Encoder.php

---

*Support the original author [Fris](https://github.com/OGFris), who does great work*
