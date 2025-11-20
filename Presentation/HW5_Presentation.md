---
marp: true
theme: default
class: lead
paginate: true
title: "CSC-640 — HW5: Software Quality"
---

# **HW5 Report — Software Quality**
### CSC-640  


---

# **Week 1 — Introduction to Software Quality**

## Topics Covered
- Definition of software quality  
- Complexity in modern systems  
- Software engineering principles (KISS, DRY, SOC)  
- The “No Surprises” team philosophy  
- 4D Development Cycle (Define → Design → Develop → Deploy)

---

## What Is Software Quality?
Software quality goes beyond correctness:

- Reliability  
- Maintainability  
- Adaptability  
- Testability  
- Clarity in structure & behavior

Key idea:  
**Qualityful software is built for change, not completion.**

---

## Managing Complexity 
- **Complexity** is the greatest threat to reliability and performance.  
- Engineers manage it through:  
  - **Modular design** and separation of concerns.  
  - **Clear documentation** and naming standards.  
  - **Iterative testing** to prevent error growth.  

`Quality engineers manage complexity, not avoid it.`

---

## Core Engineering Principles

### KISS  
Keep designs simple and purposeful.

### DRY  
Avoid code duplication to reduce bugs.

### Separation of Concerns  
Each component handles one well-defined purpose.

`These principles prepare systems for long-term evolution.`

---

## Team Practices: “No Surprises”
A professional engineering team ensures:

- Transparent decision-making  
- Early sharing of progress  
- No unannounced changes  
- Predictable workflows  

`Quality is both technical and collaborative.`

---

## Week 1 Summary
I learned:

- The meaning of quality in software engineering  
- Why complexity drives design decisions  
- How simplicity and structure support maintainability  
- How professional communication improves software outcomes

---

# **Week 2 — Software Process**

## Topics Covered
- Software development models  
- Waterfall, Spiral, and Agile  
- Process-driven development  
- Milestone planning  
- Connection to HW4 REST API project

---

## Why Software Process Is Important
Process provides:

- Predictability  
- Structure  
- Communication framework  
- Risk reduction  
- Clear milestones  

`Without process, even skilled developers produce inconsistent systems.`

---

## Development Models
### Waterfall
- Linear & sequential  
- Works for stable requirements  
- Difficult to modify after each phase
### Spiral
- Adds risk evaluation  
- Cycles through planning, analysis, and validation  
- Useful for large/uncertain projects
### Agile
- Iterative and adaptive  
- Frequent customer feedback  
- Aligns with modern development environments

---

## Milestones in Practice (HW4 Example)

| Milestone | Description |
|----------|-------------|
| 1 | Create MySQL database + schema |
| 2 | Build REST endpoints (unauthenticated) |
| 3 | Add Bearer Token authentication |
| 4 | Run integration tests + configure NGINX |

`Milestones reduced uncertainty and improved development flow.`

---

## Week 2 Summary

- Practical understanding of development models  
- Experience using process to organize real work  
- Insight into iterative improvement through milestones  
- Preparation for process-oriented project execution

---

# **Week 3 — Software Design: APIEC, OOP, UML**

## Topics Covered
- OOP principles: Abstraction, Encapsulation, Inheritance, Polymorphism  
- APIEC design structure  
- UML: Use Case, Class, and Sequence Diagrams  
- DRY and modular design  
- Reporting system design examples  

---

## Object-Oriented Programming (OOP)
OOP provides structure for managing complexity:

- **Abstraction** — focus on essential details  
- **Encapsulation** — internal state protection  
- **Polymorphism** — flexible behavior  
- **Inheritance** — reuse of shared functionality  

Used together, they shape maintainable systems.

---

## APIEC Approach
Course design model:

1. Abstraction  
2. Polymorphism  
3. Inheritance  
4. Encapsulation  
5. Composition  

APIEC reinforces modularity and clarity.

---

## UML Diagrams

### Use Case Diagrams  
Model user goals and system interactions.

### Class Diagrams  
Define attributes, behavior, and relationships.

### Sequence Diagrams  
Show message flow between objects over time.

UML improves design correctness before coding begins.

---

## DRY and Clean Design
Code duplication leads to:

- Multiple failure points  
- Hard-to-maintain systems  
- Divergent logic  

Refactoring through abstraction ensures consistency and long-term maintainability.

---

## Reporting System Example
Initial issue:
- `isinstance()` checks → code smell  

Solution:
- Polymorphism (`print_report()`)  
- Each report type handles its own output  
- Cleaner, more extendable design  

---

## Week 3 Summary

- Strong understanding of OOP pillars  
- Ability to use UML for planning systems  
- Skills to detect duplication and refactor  
- Understanding of design clarity through APIEC

---

# **Week 4 — SOLID, Testing, and Design Patterns**

## Topics Covered
- SOLID Principles  
- Unit, Integration, Regression Testing  
- Refactoring through composition  
- Avoiding class explosion  
- Shift system design example  

---

## SOLID Principles

### SRP  
One class = one responsibility

### OCP  
Extend behavior without rewriting existing code

### LSP  
Subclasses must follow base class expectations

### ISP  
Avoid “fat” interfaces

### DIP  
Depend on abstractions, not concrete classes

These principles create adaptable and safe architectures.

---

## Testing for Quality
Testing ensures:

- Correct behavior  
- Safety during refactoring  
- Early detection of defects  
- Confidence in deployment

Test types:

- Unit Test  
- Integration Test  
- System Test  
- Regression Test

---

## Design Patterns & Refactoring

### Avoiding `isinstance()`
Use polymorphism to delegate behavior.

### Avoiding Class Explosion
Use composition when:

- Many combinations of behaviors exist  
- Inheritance becomes unmanageable  

### Aggregation
Defines ownership while allowing independent lifecycles.

---

## Shift System Example
Problem:
- Multiple job titles × multiple shift types → too many subclasses

Solution:
- Shift objects  
- Employee composed with a Shift  
- Cleaner, scalable structure

---

## Week 4 Summary

- How SOLID supports long-term maintainability  
- How testing enables safe iteration  
- How composition improves scalability  
- How to identify and correct design smells

---

# **Personal Reflection (Weeks 1–4)**

Lessons Learned:

- The foundations of software quality  
- How processes and models guide development  
- How OOP and UML support clean design  
- How SOLID and testing stabilize evolving software  
- How refactoring ensures long-term adaptability  

This material provides a strong base for advanced software engineering topics.
